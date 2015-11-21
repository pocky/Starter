<?php

namespace spec\Infrastructure\Website\CQRS;

use Application\Website\DTO\CreateWebsiteDTO;
use Domain\Website\ValueObject\Author;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Infrastructure\Website\CQRS\CreateWebsiteCommand');
    }

    function let()
    {
        $author = new Author("John Doe");
        $this->beConstructedWith("name", "description", $author);
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
        $this->getAuthor()->beAnInstanceOf('Domain\Website\ValueObject\Author');
        $this->getAuthor()->getValue()->shouldReturn("John Doe");
    }
}
