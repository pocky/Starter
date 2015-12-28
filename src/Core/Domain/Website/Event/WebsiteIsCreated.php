<?php

namespace Black\Core\Domain\Website\Event;

use Black\Core\Domain\Website\Entity\Website;

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
