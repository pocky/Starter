<?php

namespace spec\Black\Website\Infrastructure\CQRS\Handler;

use Black\Website\Domain\Entity\Website;
use Black\Website\Infrastructure\CQRS\Command\ActiveWebsiteCommand;
use Black\Website\Infrastructure\Service\WriteService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ActiveWebsiteHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\CQRS\Handler\ActiveWebsiteHandler');
    }

    function let(WriteService $service, EventDispatcherInterface $dispatcher)
    {
        $this->beConstructedWith($service, $dispatcher);
    }

    function it_should_handle_a_command(ActiveWebsiteCommand $command, Website $website)
    {
        $command->getWebsite()->willReturn($website);
        $this->handle($command);
    }
}
