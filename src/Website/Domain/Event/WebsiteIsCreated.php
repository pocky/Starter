<?php

namespace Black\Website\Domain\Event;

use Black\Website\Domain\Entity\Website;

class WebsiteIsCreated
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
