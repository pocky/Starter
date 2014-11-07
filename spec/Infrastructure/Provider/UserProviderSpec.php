<?php

namespace spec\Infrastructure\Provider;

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

    function let()
    {
        $this->className = 'Domain\Model\User';

        $this->beConstructedWith($this->className);
    }

    function it_should_load_a_username($username)
    {
        $this->loadUserByUsername($username);
    }

    function it_should_refresh_an_user(UserInterface $user)
    {
        $this->refreshUser($user);
    }

    function it_should_support_class()
    {
        $this->supportsClass('Domain\Model\User');
    }
}
