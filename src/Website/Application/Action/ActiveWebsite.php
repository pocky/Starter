<?php

namespace Black\Website\Application\Action;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Bus;
use Black\Website\Domain\Entity\Website;
use Black\Website\Infrastructure\CQRS\Command\ActiveWebsiteCommand;

class ActiveWebsite
{
    protected $bus;

    public function __construct(Bus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(Website $website)
    {
        $command = new ActiveWebsiteCommand($website);
        $this->bus->handle($command);
    }
}
