<?php

namespace Black\Website\Infrastructure\CQRS\Handler;

use Black\Website\Domain\Event\WebsiteIsDisabled;
use Black\Website\Infrastructure\CQRS\Command\DisableWebsiteCommand;
use Black\Website\Infrastructure\Service\WriteService;

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
