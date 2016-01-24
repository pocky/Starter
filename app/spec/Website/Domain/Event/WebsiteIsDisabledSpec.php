<?php

namespace spec\Black\Website\Domain\Event;

use Black\Website\Domain\Entity\Website;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebsiteIsDisabledSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Domain\Event\WebsiteIsDisabled');
    }

    function let(Website $website)
    {
        $website->getName()->willReturn("website");
        $this->beConstructedWith($website);
    }

    function it_should_have_a_website()
    {
        $this->getWebsite()->getName()->shouldReturn("website");
    }
}
