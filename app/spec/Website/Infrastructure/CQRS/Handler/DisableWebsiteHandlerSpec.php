<?php

namespace spec\Black\Website\Infrastructure\CQRS\Handler;

use Black\Website\Domain\Entity\Website;
use Black\Website\Infrastructure\CQRS\Command\DisableWebsiteCommand;
use Black\Website\Infrastructure\Service\WriteService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DisableWebsiteHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\CQRS\Handler\DisableWebsiteHandler');
    }

    function let(WriteService $service, EventDispatcherInterface $dispatcher)
    {
        $this->beConstructedWith($service, $dispatcher);
    }

    function it_should_handle_a_command(DisableWebsiteCommand $command, Website $website)
    {
        $command->getWebsite()->willReturn($website);
        $this->handle($command);
    }
}