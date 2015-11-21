<?php

namespace spec\Infrastructure\Website\Service;

use Domain\Website\Entity\Website;
use Domain\Website\Repository\WebsiteRepository;
use Domain\Website\ValueObject\WebsiteId;
use Infrastructure\Website\Persistence\CQRS\ReadRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReadServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Infrastructure\Website\Service\ReadService');
    }

    function let(ReadRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_should_find_a_website(WebsiteRepository $repository, Website $website)
    {
        $id = new WebsiteId(1234);
        $repository->find($id)->shouldBeCalled();
        $repository->find($id)->willReturn($website);

        $this->find($id)->shouldBeAnInstanceOf('Domain\Website\Entity\Website');
    }
}
