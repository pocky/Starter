<?php

namespace Black\Website\Infrastructure\CQRS\Handler;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Command;
use Black\Website\Infrastructure\Service\WriteService;

class UpdateWebsiteHandler
{
    private $service;

    public function __construct(WriteService $service)
    {
        $this->service = $service;
    }

    public function handle(Command $command)
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
