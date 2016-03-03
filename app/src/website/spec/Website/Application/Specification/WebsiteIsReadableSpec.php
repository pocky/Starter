<?php

namespace spec\Black\Website\Application\Specification;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Enum\WebsiteStatus;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebsiteIsReadableSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Application\Specification\WebsiteIsReadable');
    }

    function it_should_satisfied(Website $website)
    {
        $website->getStatus()->willReturn(WebsiteStatus::ACTIVE);
        $this->isSatisfiedBy($website)->shouldReturn(true);
    }

    function it_should_not_be_satisfied(Website $website)
    {
        $website->getStatus()->willReturn(WebsiteStatus::INACTIVE);
        $this->isSatisfiedBy($website)->shouldReturn(false);
    }
}
