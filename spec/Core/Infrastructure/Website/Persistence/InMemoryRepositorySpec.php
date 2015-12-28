<?php

namespace spec\Black\Core\Infrastructure\Website\Persistence;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\ValueObject\WebsiteId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\Persistence\InMemoryRepository');
    }

    function it_should_not_find_any_website()
    {
        $this->findAll()->shouldBeArray();
        $this->findAll()->shouldReturn([]);
    }

    function it_should_find_a_website(Website $website)
    {
        $id = new WebsiteId(1234);
        $website->getWebsiteId()->willReturn($id);

        $this->add($website);
        $website = $this->find($id);
        $website->getWebsiteId()->getValue()->shouldReturn("1234");
    }

    function it_should_remove_a_website(Website $website)
    {
        $id = new WebsiteId(1234);
        $website->getWebsiteId()->willReturn($id);
        $this->add($website);

        $this->remove($website);
        $this->findAll()->shouldReturn([]);
    }

    function it_should_update_a_website(Website $website)
    {
        $id = new WebsiteId(1234);
        $website->getWebsiteId()->willReturn($id);
        $website->getName()->willReturn("test");
        $this->add($website);

        $website->getName()->willReturn("test2");
        $this->update($website);

        $website = $this->find($id);
        $website->getName()->shouldReturn("test2");
    }
}
