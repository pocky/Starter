<?php

namespace Application\Website\Specification;

use Domain\Website\Entity\Website;
use Domain\Website\Entity\WebsiteStatus;

class WebsiteIsReadable
{
    public function isSatisfiedBy(Website $website)
    {
        return $website->getStatus() == WebsiteStatus::ACTIVE;
    }
}
