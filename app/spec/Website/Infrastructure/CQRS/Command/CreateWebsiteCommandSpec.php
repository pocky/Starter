<?php

namespace spec\Black\Website\Infrastructure\CQRS\Command;

use Black\Website\Application\Website\DTO\CreateWebsiteDTO;
use Black\Website\Domain\ValueObject\Author;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\CQRS\Command\CreateWebsiteCommand');
    }

    function let()
    {
        $author = new Author("John Doe");
        $this->beConstructedWith("name", "description", $author, "fr_FR");
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
        $this->getAuthor()->beAnInstanceOf('Black\Website\Domain\ValueObject\Author');
        $this->getAuthor()->getValue()->shouldReturn("John Doe");
    }

    function it_should_have_a_language()
    {
        $this->getLanguage()->shouldReturn("fr_FR");
    }
}
