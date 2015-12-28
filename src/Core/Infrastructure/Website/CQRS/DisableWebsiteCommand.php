<?php

namespace Black\Core\Infrastructure\Website\CQRS;

use Black\Core\Domain\Website\Entity\Website;

class DisableWebsiteCommand
{
    private $website;

    public function __construct(Website $website)
    {
        $this->website = $website;
    }

    public function getWebsite()
    {
        return $this->website;
    }
}
