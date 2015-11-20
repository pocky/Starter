<?php

namespace Domain\Website\Entity;

use Domain\Website\ValueObject\Author;
use Domain\Website\ValueObject\WebsiteId;

class Website
{
    protected $websiteId;

    protected $name;

    protected $description;

    public function __construct(WebsiteId $websiteId, $name, $description, Author $author)
    {
        $this->websiteId = $websiteId;
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
    }

    public function getWebsiteId()
    {
        return $this->websiteId;
    }

    public function getName()
    {
        return (string) $this->name;
    }

    public function getDescription()
    {
        return (string) $this->description;
    }

    public function getAuthor()
    {
        return $this->author;
    }
}
