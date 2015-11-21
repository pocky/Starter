<?php

namespace Infrastructure\Website\CQRS;

use Domain\Website\Entity\Website;
use Domain\Website\Event\WebsiteIsCreated;
use Domain\Website\ValueObject\WebsiteId;
use Infrastructure\Website\Service\WriteService;
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
