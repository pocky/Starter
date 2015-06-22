<?php

namespace Infrastructure\Provider;

use Black\Component\User\Infrastructure\CQRS\Command\ConnectUserCommand;
use Black\Component\User\Infrastructure\CQRS\Handler\ConnectUserHandler;
use Black\Component\User\Infrastructure\Service\UserReadService;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Class UserProvider
 */
class UserProvider implements UserProviderInterface
{
    /**
     * @var
     */
    protected $className;

    /**
     * @var ConnectUserHandler
     */
    protected $handler;

    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * @param UserReadService $readService
     * @param ConnectUserHandler $handler
     * @param $className
     */
    public function __construct(
        UserReadService $readService,
        ConnectUserHandler $handler,
        $className
    ) {
        $this->service   = $readService;
        $this->handler   = $handler;
        $this->className = $className;
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

        $command = new ConnectUserCommand($user);
        $this->handler->handle($command);

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
