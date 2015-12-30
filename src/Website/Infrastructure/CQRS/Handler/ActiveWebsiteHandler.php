<?php

namespace Black\Website\Infrastructure\CQRS\Handler;

use Black\Website\Domain\Event\WebsiteIsActivated;
use Black\Website\Infrastructure\CQRS\Command\ActiveWebsiteCommand;
use Black\Website\Infrastructure\Service\WriteService;

class ActiveWebsiteHandler
{
    private $service;

    public function __construct(WriteService $service)
    {
        $this->service = $service;
    }

    public function handle(ActiveWebsiteCommand $command)
    {
        $this->service->activate($command->getWebsite());
        $event = new WebsiteIsActivated($command->getWebsite());
    }
}
