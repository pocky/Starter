<?php

namespace Black\Website\Infrastructure\Listener;

use Black\Website\Domain\WebsiteEvents;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class LoggerListener
 */
class LoggerListener implements EventSubscriberInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            WebsiteEvents::WEBSITE_CREATED => 'addInfoLog',
            WebsiteEvents::WEBSITE_ACTIVATED => 'addInfoLog',
            WebsiteEvents::WEBSITE_DISABLED => 'addInfoLog'
        ];
    }

    /**
     * @param Event $event
     */
    public function addInfoLog(Event $event)
    {
        $website = $event->getWebsite();

        $this->logger->info($event->getMessage(), [
            "id" => $website->getWebsiteId()->getValue(),
            "name" => $website->getName(),
        ]);
    }
}
