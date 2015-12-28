<?php

namespace Black\Core\Infrastructure\Website\CQRS;

use Black\Core\Domain\Website\Event\WebsiteIsActivated;
use Black\Core\Infrastructure\Website\Service\WriteService;

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
