<?php

namespace spec\Domain\Model;

use Black\Component\User\Domain\Model\UserId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\Model\User');
        $this->beAnInstanceOf('Black\Component\User\Domain\Model\User');
        $this->beAnInstanceOf('Symfony\Component\Security\Core\User\AdvancedUserInterface');
    }

    function let()
    {
        $userId = new UserId('1234');
        $this->beConstructedWith($userId, 'username', 'email@domain.tld');
    }

    function it_should_have_an_id()
    {
        $this->getId();
    }

    function it_should_have_a_username()
    {
        $this->getUsername()->shouldReturn('username');
    }

    function it_should_not_have_a_group()
    {
        $this->getGroups()->shouldBeAnInstanceOf('Doctrine\Common\Collections\ArrayCollection');
        $this->getGroups()->shouldBeEmpty();
    }

    function if_should_not_have_a_role()
    {
        $this->getRoles()->shouldBeAnInstanceOf('Doctrine\Common\Collections\ArrayCollection');
        $this->getRoles()->shouldBeEmpty();
    }

    function it_should_erase_credentials()
    {
        $this->eraseCredentials()->shouldReturn(true);
    }

    function it_should_not_be_expired()
    {
        $this->isAccountNonExpired()->shouldReturn(true);
    }

    function it_should_be_locked()
    {
        $this->isAccountNonLocked()->shouldReturn(true);
    }

    function it_should_have_credentials()
    {
        $this->isCredentialsNonExpired()->shouldReturn(true);
    }

    function it_should_not_be_enabled()
    {
        $this->isEnabled()->shouldReturn(false);
    }
}