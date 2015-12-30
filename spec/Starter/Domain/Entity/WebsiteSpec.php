<?php

namespace spec\Starter\Domain\Entity;

use Black\Website\Domain\ValueObject\Author;
use Black\Website\Domain\ValueObject\WebsiteId;
use Starter\Domain\Entity\Website;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebsiteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Starter\Domain\Entity\Website');
        $this->shouldImplement('Black\Website\Domain\Entity\Website');
    }

    function let()
    {
        $websiteId = new WebsiteId(1234);
        $author = new Author("john doe");
        $this->beConstructedWith($websiteId, "name", "description", $author);
    }

    function it_should_get_an_id(Website $website)
    {
        $website->getId()->willReturn(1);
    }
}
