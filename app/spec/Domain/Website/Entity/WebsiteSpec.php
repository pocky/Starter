<?php

namespace spec\Domain\Website\Entity;

use Black\Website\Domain\ValueObject\Author;
use Black\Website\Domain\ValueObject\WebsiteId;
use Domain\Website\Entity\Website;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rhumsaa\Uuid\Uuid;

class WebsiteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\Website\Entity\Website');
        $this->shouldImplement('Black\Website\Domain\Entity\Website');
    }

    function let()
    {
        $websiteId = new WebsiteId(1234);
        $author = new Author("john doe");
        $this->beConstructedWith($websiteId, "name", "headline", "description", $author, "fr");
    }

    function it_should_get_an_id(Website $website)
    {
        $website->getId()->willReturn(Uuid::uuid4());
    }
}
