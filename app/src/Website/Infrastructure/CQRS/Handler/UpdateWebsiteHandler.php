<?php

namespace Black\Website\Infrastructure\CQRS\Handler;

use Black\Website\Infrastructure\CQRS\Command\UpdateWebsiteCommand;
use Black\Website\Infrastructure\Service\WriteService;

class UpdateWebsiteHandler
{
    private $service;

    public function __construct(WriteService $service)
    {
        $this->service = $service;
    }

    public function handle(UpdateWebsiteCommand $command)
    {
        $this->service->update(
            $command->getName(),
            $command->getHeadline(),
            $command->getDescription(),
            $command->getAuthor(),
            $command->getWebsite()
        );
    }
}
