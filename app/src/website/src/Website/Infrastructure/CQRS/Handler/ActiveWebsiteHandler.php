<?php

namespace Black\Website\Infrastructure\CQRS\Handler;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Command;
use Black\DDD\CQRSinPHP\Infrastructure\CQRS\CommandHandler;
use Black\Website\Domain\Event\WebsiteIsActivated;
use Black\Website\Domain\WebsiteEvents;
use Black\Website\Infrastructure\Service\WriteService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ActiveWebsiteHandler implements CommandHandler
{
    private $service;

    private $dispatcher;

    public function __construct(
        WriteService $service,
        EventDispatcherInterface $dispatcher
    ) {
        $this->service = $service;
        $this->dispatcher = $dispatcher;
    }

    public function handle(Command $command)
    {
        $this->service->activate($command->getWebsite());

        $event = new WebsiteIsActivated($command->getWebsite());
        $this->dispatcher->dispatch(WebsiteEvents::WEBSITE_ACTIVATED, $event);
    }
}
