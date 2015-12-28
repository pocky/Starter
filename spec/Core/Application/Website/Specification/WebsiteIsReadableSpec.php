<?php

namespace spec\Black\Core\Application\Website\Specification;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\Entity\WebsiteStatus;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebsiteIsReadableSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Application\Website\Specification\WebsiteIsReadable');
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
