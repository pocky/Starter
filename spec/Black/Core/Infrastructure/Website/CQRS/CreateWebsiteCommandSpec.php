<?php

namespace spec\Black\Core\Infrastructure\Website\CQRS;

use Black\Core\Application\Website\DTO\CreateWebsiteDTO;
use Black\Core\Domain\Website\ValueObject\Author;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\CQRS\CreateWebsiteCommand');
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
        $this->getAuthor()->beAnInstanceOf('Black\Core\Domain\Website\ValueObject\Author');
        $this->getAuthor()->getValue()->shouldReturn("John Doe");
    }
}
