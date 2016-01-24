<?php

namespace spec\Black\Website\Infrastructure\Service;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Repository\WebsiteRepository;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Infrastructure\Persistence\CQRS\WriteRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WriteServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\Service\WriteService');
    }

    function let(WriteRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    function it_should_create_website(Website $website, WebsiteRepository $repository)
    {
        $repository->add($website)->shouldBeCalled();
        $this->createWebsite($website);
    }

    function it_should_activate(Website $website)
    {
        $website->activate()->shouldBeCalled();
        $this->activate($website);
    }

    function it_should_disable(Website $website)
    {
        $website->disable()->shouldBeCalled();
        $this->disable($website);
    }

    function it_should_update(Website $website)
    {
        $author = new Author("John Doe");
        $website->update("name", "description", $author)->shouldBeCalled();

        $this->update("name", "description", $author, $website);
    }
}
