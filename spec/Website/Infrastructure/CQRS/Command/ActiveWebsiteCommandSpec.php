<?php

namespace spec\Black\Website\Infrastructure\CQRS\Command;

use Black\Website\Domain\Entity\Website;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActiveWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\CQRS\Command\ActiveWebsiteCommand');
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
