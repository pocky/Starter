<?php

namespace Black\Website\Infrastructure\CQRS\Handler;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Event\WebsiteIsCreated;
use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Infrastructure\CQRS\Command\CreateWebsiteCommand;
use Black\Website\Infrastructure\Service\WriteService;
use Rhumsaa\Uuid\Uuid;

class CreateWebsiteHandler
{
    private $service;

    public function __construct(WriteService $service)
    {
        $this->service = $service;
    }

    public function handle(CreateWebsiteCommand $command)
    {
        $websiteId = new WebsiteId(Uuid::uuid4());

        $website = new Website($websiteId, $command->getName(), $command->getDescription(), $command->getAuthor());
        $this->service->createWebsite($website);

        $event = new WebsiteIsCreated($website);
    }
}
