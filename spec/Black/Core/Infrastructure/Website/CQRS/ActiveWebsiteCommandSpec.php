<?php

namespace spec\Black\Core\Infrastructure\Website\CQRS;

use Black\Core\Domain\Website\Entity\Website;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActiveWebsiteCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\CQRS\ActiveWebsiteCommand');
    }

    function let(Website $website)
    {
        $this->beConstructedWith($website);
    }

    function it_should_have_an_id()
    {
        $this->getWebsite()->beAnInstanceOf('Black\Core\Domain\Website\Entity\Website');
    }
}
