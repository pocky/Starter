<?php

namespace Black\Website\Domain\Event;

use Black\Website\Domain\Entity\Website;
use Symfony\Component\EventDispatcher\Event;

class WebsiteIsCreated extends Event
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

    public function getMessage() : string
    {
        return "website.created";
    }
}
