<?php

namespace Black\Website\Infrastructure\CQRS\Command;

use Black\Website\Domain\Entity\Website;

class DisableWebsiteCommand
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
