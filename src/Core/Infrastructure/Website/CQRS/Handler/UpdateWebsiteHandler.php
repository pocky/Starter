<?php

namespace Black\Core\Infrastructure\Website\CQRS\Handler;

use Black\Core\Infrastructure\Website\CQRS\Command\UpdateWebsiteCommand;
use Black\Core\Infrastructure\Website\Service\WriteService;

class UpdateWebsiteHandler
{
    private $service;

    public function __construct(WriteService $service)
    {
        $this->service = $service;
    }

    public function handle(UpdateWebsiteCommand $command)
    {
        $this->service->update($command->getName(), $command->getDescription(), $command->getAuthor(), $command->getWebsite());
    }
}
