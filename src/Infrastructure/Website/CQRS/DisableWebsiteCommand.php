<?php

namespace Infrastructure\Website\CQRS;

use Domain\Website\Entity\Website;

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