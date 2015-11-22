<?php

namespace spec\Domain\Website\ValueObject;

use Domain\Website\ValueObject\Author;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AuthorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\Website\ValueObject\Author');
    }

    function let()
    {
        $this->beConstructedWith("name");
    }

    function it_should_have_a_value()
    {
        $this->getValue()->shouldReturn("name");
    }

    function it_should_be_equal()
    {
        $author = new Author("name");
        $this->isEqualTo($author)->shouldReturn(true);
    }
}