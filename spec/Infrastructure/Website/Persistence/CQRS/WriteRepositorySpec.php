<?php

namespace spec\Infrastructure\Website\Persistence\CQRS;

use Domain\Website\Entity\Website;
use Domain\Website\Repository\WebsiteRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WriteRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Infrastructure\Website\Persistence\CQRS\WriteRepository');
    }

    function let(WebsiteRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_should_add_a_website(Website $website)
    {
        $this->add($website);
    }
}
