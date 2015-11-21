<?php

namespace spec\Infrastructure\Website\CQRS;

use Domain\Website\Entity\Website;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DisableWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Infrastructure\Website\CQRS\DisableWebsiteCommand');
    }

    function let(Website $website)
    {
        $this->beConstructedWith($website);
    }

    function it_should_have_an_id()
    {
        $this->getWebsite()->beAnInstanceOf('Domain\Website\Entity\Website');
    }
}
