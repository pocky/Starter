<?php

namespace spec\Black\Website\Infrastructure\CQRS\Command;

use Black\Website\Domain\Entity\Website;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DisableWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\CQRS\Command\DisableWebsiteCommand');
    }

    function let(Website $website)
    {
        $this->beConstructedWith($website);
    }

    function it_should_have_an_id()
    {
        $this->getWebsite()->beAnInstanceOf('Black\Website\Domain\Entity\Website');
    }
}
