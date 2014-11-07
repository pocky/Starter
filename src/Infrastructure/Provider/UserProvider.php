<?php

namespace Infrastructure\Provider;

use Black\Component\User\Infrastructure\Service\UserReadService;
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
     * @param UserReadService $service
     * @param $className
     */
    public function __construct(
        UserReadService $service,
        $className
    ) {
        $this->service   = $service;
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

        return $username;
    }

    /**
     * @param UserInterface $user
     * @return string|UserInterface
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof UserInterface ) {
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
