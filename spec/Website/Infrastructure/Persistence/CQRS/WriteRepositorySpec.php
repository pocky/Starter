<?php

namespace spec\Black\Website\Infrastructure\Persistence\CQRS;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Repository\WebsiteRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WriteRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\Persistence\CQRS\WriteRepository');
    }

    function let(WebsiteRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_should_add_a_website(Website $website)
    {
        $this->add($website);
    }

    public function it_should_update_a_website(Website $website)
    {
        $this->update($website);
    }
}
