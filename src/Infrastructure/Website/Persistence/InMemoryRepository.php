<?php

namespace Infrastructure\Website\Persistence;

use Domain\Website\Entity\Website;
use Domain\Website\ValueObject\WebsiteId;
use Domain\Website\Repository\WebsiteRepository;

class InMemoryRepository implements WebsiteRepository
{
    protected $website;

    public function __construct()
    {
        $this->website = [];
    }

    public function findAll()
    {
        return $this->website;
    }

    public function add(Website $website)
    {
        if (!isset($this->website[$website->getWebsiteId()->getValue()])) {
            $this->website[$website->getWebsiteId()->getValue()] = $website;
        }
    }

    public function find(WebsiteId $id)
    {
        if (isset($this->website[$id->getValue()])) {
            return $this->website[$id->getvalue()];
        }
    }

    public function remove(Website $website)
    {
        unset($this->website[$website->getWebsiteId()->getValue()]);
    }

    public function update(Website $website)
    {
        if (isset($this->website[$website->getWebsiteId()->getValue()])) {
            $this->website[$website->getWebsiteId()->getValue()] = $website;
        }
    }
}
