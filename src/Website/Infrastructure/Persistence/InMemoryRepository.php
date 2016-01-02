<?php

namespace Black\Website\Infrastructure\Persistence;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Domain\Repository\WebsiteRepository;

class InMemoryRepository implements WebsiteRepository
{
    protected $className;

    protected $website;

    public function __construct($className)
    {
        $this->classname = $className;
        $this->website = [];
    }

    public function findAll() : array
    {
        return $this->website;
    }

    public function add(Website $website)
    {
        if (!isset($this->website[$website->getWebsiteId()->getValue()])) {
            $this->website[$website->getWebsiteId()->getValue()] = $website;
        }
    }

    public function find(WebsiteId $id) : Website
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

    public function getClassName()
    {
        return $this->className;
    }
}
