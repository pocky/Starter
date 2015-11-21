<?php

namespace Application\Website\DTO;

use Domain\Website\Entity\Website;

class ActiveWebsiteDTO
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
