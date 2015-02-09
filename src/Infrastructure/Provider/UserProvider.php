<?php

namespace Infrastructure\Provider;

use Black\Component\User\Domain\Event\UserLoggedEvent;
use Black\Component\User\Infrastructure\Doctrine\UserManager;
use Black\Component\User\Infrastructure\Service\UserReadService;
use Black\Component\User\UserDomainEvents;
use Domain\Model\User;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Class UserProvider
 *
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
 */
class UserProvider implements UserProviderInterface
{
    /**
     * @var
     */
    protected $className;

    /**
     * @var UserReadService
     */
    protected $service;

    /**
     * @var UserManager
     */
    protected $manager;

    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * @param UserReadService $readService
     * @param UserManager $userManager
     * @param EventDispatcherInterface $dispatcher
     * @param $className
     */
    public function __construct(
        UserReadService $readService,
        UserManager $userManager,
        EventDispatcherInterface $dispatcher,
        $className
    ) {
        $this->service    = $readService;
        $this->manager    = $userManager;
        $this->dispatcher = $dispatcher;
        $this->className  = $className;
    }

    /**
     * @param string $username
     * @return string|UserInterface
     */
    public function loadUserByUsername($username)
    {
        $user = $this->service->loadUser($username);

        if (null === $user) {
            throw new UsernameNotFoundException();
        }

        $user->connect();
        $this->manager->flush();

        $event = new UserLoggedEvent($user);
        $this->dispatcher->dispatch(UserDomainEvents::USER_DOMAIN_LOGGED, $event);

        return $user;
    }

    /**
     * @param UserInterface $user
     * @return string|UserInterface
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof UserInterface) {
            throw new UnsupportedUserException();
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * @param string $class
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === $this->className;
    }
}
