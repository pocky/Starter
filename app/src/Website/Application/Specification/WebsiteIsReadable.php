<?php

namespace Black\Website\Application\Specification;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Enum\WebsiteStatus;

class WebsiteIsReadable
{
    public function isSatisfiedBy(Website $website) : bool
    {
        return $website->getStatus() == WebsiteStatus::ACTIVE;
    }
}
