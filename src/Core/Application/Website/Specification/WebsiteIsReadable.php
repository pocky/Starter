<?php

namespace Black\Core\Application\Website\Specification;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\Entity\WebsiteStatus;

class WebsiteIsReadable
{
    public function isSatisfiedBy(Website $website)
    {
        return $website->getStatus() == WebsiteStatus::ACTIVE;
    }
}
