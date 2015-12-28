<?php

namespace spec\Black\Core\Infrastructure\Website\Persistence\CQRS;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\Repository\WebsiteRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WriteRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\Persistence\CQRS\WriteRepository');
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
