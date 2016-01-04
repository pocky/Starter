<?php

namespace Black\Website\Infrastructure\CQRS\Handler;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Command;
use Black\DDD\CQRSinPHP\Infrastructure\CQRS\CommandHandler;
use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Event\WebsiteIsCreated;
use Black\Website\Domain\Repository\WebsiteRepository;
use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Infrastructure\Service\WriteService;
use Rhumsaa\Uuid\Uuid;

/**
 * Class CreateWebsiteHandler
 */
class CreateWebsiteHandler implements CommandHandler
{
    private $service;

    private $website;

    public function __construct(WriteService $service, WebsiteRepository $repository)
    {
        $this->service = $service;
        $this->website = $repository->getClassName();
    }

    public function handle(Command $command)
    {
        $websiteId = new WebsiteId(Uuid::uuid4());

        $website = new $this->website($websiteId, $command->getName(), $command->getDescription(), $command->getAuthor());
        $this->service->createWebsite($website);

        $event = new WebsiteIsCreated($website);
    }
}
