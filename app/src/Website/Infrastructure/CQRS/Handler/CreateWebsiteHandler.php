<?php

namespace Black\Website\Infrastructure\CQRS\Handler;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Command;
use Black\DDD\CQRSinPHP\Infrastructure\CQRS\CommandHandler;
use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Event\WebsiteIsCreated;
use Black\Website\Domain\Repository\WebsiteRepository;
use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Domain\WebsiteEvents;
use Black\Website\Infrastructure\Service\WriteService;
use Rhumsaa\Uuid\Uuid;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CreateWebsiteHandler
 */
class CreateWebsiteHandler implements CommandHandler
{
    private $service;

    private $website;

    private $dispatcher;

    public function __construct(
        WriteService $service,
        WebsiteRepository $repository,
        EventDispatcherInterface $dispatcher
    ) {
        $this->service = $service;
        $this->website = $repository->getClassName();
        $this->dispatcher = $dispatcher;
    }

    public function handle(Command $command)
    {
        $websiteId = new WebsiteId(Uuid::uuid4());
        $website = new $this->website(
            $websiteId,
            $command->getName(),
            $command->getHeadline(),
            $command->getDescription(),
            $command->getAuthor(),
            $command->getLanguage()
        );

        $this->service->createWebsite($website);

        $event = new WebsiteIsCreated($website);
        $this->dispatcher->dispatch(WebsiteEvents::WEBSITE_CREATED, $event);
    }
}
