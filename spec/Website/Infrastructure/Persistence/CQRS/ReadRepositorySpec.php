<?php

namespace spec\Black\Website\Infrastructure\Persistence\CQRS;

use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Domain\Repository\WebsiteRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReadRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\Persistence\CQRS\ReadRepository');
    }

    function let(WebsiteRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_should_find_a_website()
    {
        $id = new WebsiteId(1234);
        $this->find($id);
    }
}
