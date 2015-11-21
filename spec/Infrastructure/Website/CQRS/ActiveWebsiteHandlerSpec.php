<?php

namespace spec\Infrastructure\Website\CQRS;

use Domain\Website\Entity\Website;
use Infrastructure\Website\CQRS\ActiveWebsiteCommand;
use Infrastructure\Website\Service\WriteService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActivewebsiteHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Infrastructure\Website\CQRS\ActiveWebsiteHandler');
    }

    function let(WriteService $service)
    {
        $this->beConstructedWith($service);
    }

    function it_should_handle_a_command(ActiveWebsiteCommand $command, Website $website)
    {
        $command->getWebsite()->willReturn($website);
        $this->handle($command);
    }
}
