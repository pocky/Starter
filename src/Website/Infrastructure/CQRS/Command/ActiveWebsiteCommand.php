<?php

namespace Black\Website\Infrastructure\CQRS\Command;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Command;
use Black\Website\Domain\Entity\Website;

class ActiveWebsiteCommand implements Command
{
    private $website;

    public function __construct(Website $website)
    {
        $this->website = $website;
    }

    public function getWebsite() : Website
    {
        return $this->website;
    }
}
