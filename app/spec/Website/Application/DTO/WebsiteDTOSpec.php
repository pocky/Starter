<?php

namespace spec\Black\Website\Application\DTO;

use Black\Website\Domain\ValueObject\Author;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebsiteDTOSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Application\DTO\WebsiteDTO');
    }

    function let()
    {
        $this->beConstructedWith(1234, "name", "description", "John Doe");
    }

    function it_should_have_an_id()
    {
        $this->getId()->shouldReturn("1234");
    }

    function it_should_have_a_name()
    {
        $this->getName()->shouldReturn("name");
    }

    function it_should_have_a_description()
    {
        $this->getDescription()->shouldReturn("description");
    }

    function it_should_have_an_author()
    {
        $this->getAuthor()->shouldReturn("John Doe");
    }
}
