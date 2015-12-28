<?php

namespace spec\Black\Core\Infrastructure\Website\Persistence\CQRS;

use Black\Core\Domain\Website\ValueObject\WebsiteId;
use Black\Core\Domain\Website\Repository\WebsiteRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReadRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\Persistence\CQRS\ReadRepository');
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
