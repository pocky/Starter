<?php

namespace spec\Domain\Website\Event;

use Domain\Website\Entity\Website;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebsiteIsCreatedSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\Website\Event\WebsiteIsCreated');
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