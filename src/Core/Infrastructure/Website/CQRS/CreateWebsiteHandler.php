<?php

namespace Black\Core\Infrastructure\Website\CQRS;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\Event\WebsiteIsCreated;
use Black\Core\Domain\Website\ValueObject\WebsiteId;
use Black\Core\Infrastructure\Website\Service\WriteService;
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
