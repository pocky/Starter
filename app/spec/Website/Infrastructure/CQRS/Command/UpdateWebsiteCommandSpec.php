<?php

namespace spec\Black\Website\Infrastructure\CQRS\Command;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\ValueObject\Author;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UpdateWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\CQRS\Command\UpdateWebsiteCommand');
    }

    function let(Website $website)
    {
        $author = new Author("John Doe");
        $this->beConstructedWith("name", "description", $author, $website);
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
    }

    function it_should_have_a_website()
    {
        $this->getWebsite()->beAnInstanceOf('Black\Website\Domain\Entity\Website');
    }
}
