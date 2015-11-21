<?php

namespace spec\Application\Website\DTO;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateWebsiteDTOSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Website\DTO\CreateWebsiteDTO');
    }

    function let()
    {
        $this->beConstructedWith("name", "description", "author");
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
        $this->getAuthor()->shouldReturn("author");
    }
}
