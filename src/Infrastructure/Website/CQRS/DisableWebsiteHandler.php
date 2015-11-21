<?php

namespace Infrastructure\Website\CQRS;

use Domain\Website\Event\WebsiteIsDisabled;
use Infrastructure\Website\Service\WriteService;

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
