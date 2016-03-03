<?php

namespace spec\Black\Website\Application\DTO;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateWebsiteDTOSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Application\DTO\CreateWebsiteDTO');
    }

    function let()
    {
        $this->beConstructedWith("name", "headline", "description", "author", "fr_FR");
    }

    function it_should_have_a_name()
    {
        $this->getName()->shouldReturn("name");
    }

    function it_should_have_an_headline()
    {
        $this->getHeadline()->shouldReturn("headline");
    }

    function it_should_have_a_description()
    {
        $this->getDescription()->shouldReturn("description");
    }

    function it_should_have_an_author()
    {
        $this->getAuthor()->shouldReturn("author");
    }

    function it_should_have_a_language()
    {
        $this->getLanguage()->shouldReturn("fr_FR");
    }
}
