<?php

namespace spec\Infrastructure\Website\CQRS;

use Domain\Website\Entity\Website;
use Domain\Website\ValueObject\Author;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UpdateWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Infrastructure\Website\CQRS\UpdateWebsiteCommand');
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
        $this->getAuthor()->beAnInstanceOf('Domain\Website\ValueObject\Author');
    }

    function it_should_have_a_website()
    {
        $this->getWebsite()->beAnInstanceOf('Domain\Website\Entity\Website');
    }
}
