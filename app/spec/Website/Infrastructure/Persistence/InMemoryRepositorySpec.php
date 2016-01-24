<?php

namespace spec\Black\Website\Infrastructure\Persistence;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\ValueObject\WebsiteId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryRepositorySpec extends ObjectBehavior
{
    function let()
    {
        $class = 'Black\Website\Domain\Entity\Website';
        $this->beConstructedWith($class);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\Persistence\InMemoryRepository');
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
