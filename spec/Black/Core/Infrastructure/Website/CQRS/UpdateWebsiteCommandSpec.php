<?php

namespace spec\Black\Core\Infrastructure\Website\CQRS;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\ValueObject\Author;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UpdateWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\CQRS\UpdateWebsiteCommand');
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
        $this->getAuthor()->beAnInstanceOf('Black\Core\Domain\Website\ValueObject\Author');
    }

    function it_should_have_a_website()
    {
        $this->getWebsite()->beAnInstanceOf('Black\Core\Domain\Website\Entity\Website');
    }
}
