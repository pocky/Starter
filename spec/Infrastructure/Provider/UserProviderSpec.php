<?php

namespace spec\Infrastructure\Provider;

use Black\Component\User\Infrastructure\Doctrine\UserManager;
use Black\Component\User\Infrastructure\Service\UserReadService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Security\Core\User\UserInterface;

class UserProviderSpec extends ObjectBehavior
{
    protected $className;

    function it_is_initializable()
    {
        $this->shouldHaveType('Infrastructure\Provider\UserProvider');
        $this->beAnInstanceOf('Symfony\Component\Security\Core\User\UserProviderInterface');
    }

    function let(UserReadService $service, UserManager $manager)
    {
        $this->className = 'Domain\Model\User';

        $this->beConstructedWith($service, $manager, $this->className);
    }

    function it_should_load_a_username($username)
    {
        $this
            ->shouldThrow('Symfony\Component\Security\Core\Exception\UsernameNotFoundException')
            ->duringLoadUserByUsername($username);
    }

    function it_should_refresh_an_user(UserInterface $user)
    {
        $this
            ->shouldThrow('Symfony\Component\Security\Core\Exception\UsernameNotFoundException')
            ->duringLoadUserByUsername($user);
    }

    function it_should_support_class()
    {
        $this->supportsClass('Domain\Model\User');
    }
}
