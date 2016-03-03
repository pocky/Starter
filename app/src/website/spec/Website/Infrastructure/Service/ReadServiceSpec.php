<?php

namespace spec\Black\Website\Infrastructure\Service;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Repository\WebsiteRepository;
use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Infrastructure\Persistence\CQRS\ReadRepository;
use Black\Website\Infrastructure\Persistence\CQRS\WriteRepository;
use Black\Website\Infrastructure\Persistence\InMemoryRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReadServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\Service\ReadService');
    }

    function let(ReadRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_should_find_a_website(ReadRepository $repository, Website $website)
    {
        $id = new WebsiteId(1234);
        $repository->find($id)->shouldBeCalled();
        $repository->find($id)->willReturn($website);

        $this->find($id)->shouldBeAnInstanceOf('Black\Website\Domain\Entity\Website');
    }

    public function it_should_list_websites_with_an_empty_array(ReadRepository $repository)
    {
        $repository->findAll()->shouldBeCalled();
        $this->listWebsites()->shouldBeArray();
    }
}
