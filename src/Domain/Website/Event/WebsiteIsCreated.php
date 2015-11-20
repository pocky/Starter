<?php

namespace Domain\Website\Event;

use Domain\Website\Entity\Website;

class WebsiteIsCreated
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
