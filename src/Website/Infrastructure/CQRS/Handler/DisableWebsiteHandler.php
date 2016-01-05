<?php

namespace Black\Website\Infrastructure\CQRS\Handler;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Command;
use Black\DDD\CQRSinPHP\Infrastructure\CQRS\CommandHandler;
use Black\Website\Domain\Event\WebsiteIsDisabled;
use Black\Website\Domain\WebsiteEvents;
use Black\Website\Infrastructure\CQRS\Command\DisableWebsiteCommand;
use Black\Website\Infrastructure\Service\WriteService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DisableWebsiteHandler implements CommandHandler
{
    private $dispatcher;

    private $service;

    public function __construct(
        WriteService $service,
        EventDispatcherInterface $dispatcher)
    {
        $this->service = $service;
        $this->dispatcher = $dispatcher;
    }

    public function handle(Command $command)
    {
        $this->service->disable($command->getWebsite());

        $event = new WebsiteIsDisabled($command->getWebsite());
        $this->dispatcher->dispatch(WebsiteEvents::WEBSITE_DISABLED, $event);
    }
}
