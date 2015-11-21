<?php

namespace Infrastructure\Website\CQRS;

use Domain\Website\Event\WebsiteIsActivated;
use Infrastructure\Website\Service\WriteService;

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
