<?php

namespace Black\Core\Infrastructure\Website\CQRS;

use Black\Core\Domain\Website\Event\WebsiteIsDisabled;
use Black\Core\Infrastructure\Website\Service\WriteService;

class DisableWebsiteHandler
{
    private $service;

    public function __construct(WriteService $service)
    {
        $this->service = $service;
    }

    public function handle(DisableWebsiteCommand $command)
    {
        $this->service->disable($command->getWebsite());
        $event = new WebsiteIsDisabled($command->getWebsite());
    }
}
