<?php

namespace spec\Black\Core\Infrastructure\Website\Service;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\Repository\WebsiteRepository;
use Black\Core\Domain\Website\ValueObject\WebsiteId;
use Black\Core\Infrastructure\Website\Persistence\CQRS\ReadRepository;
use Black\Core\Infrastructure\Website\Persistence\CQRS\WriteRepository;
use Black\Core\Infrastructure\Website\Persistence\InMemoryRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReadServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\Service\ReadService');
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

        $this->find($id)->shouldBeAnInstanceOf('Black\Core\Domain\Website\Entity\Website');
    }

    public function it_should_list_websites_with_an_empty_array(ReadRepository $repository)
    {
        $repository->findAll()->shouldBeCalled();
        $this->listWebsites()->shouldBeArray();
    }
}
