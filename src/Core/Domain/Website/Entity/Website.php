<?php

namespace Black\Core\Domain\Website\Entity;

use Black\Core\Domain\Website\ValueObject\Author;
use Black\Core\Domain\Website\ValueObject\WebsiteId;

class Website
{
    protected $websiteId;

    protected $name;

    protected $description;

    protected $author;

    protected $createdAt;

    protected $status;

    protected $updatedAt;

    public function __construct(WebsiteId $websiteId, string $name, string $description, Author $author)
    {
        $this->websiteId = $websiteId;
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
        $this->createdAt = new \DateTime();
        $this->status = WebsiteStatus::INACTIVE;
    }

    public function getWebsiteId() : WebsiteId
    {
        return $this->websiteId;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getAuthor() : Author
    {
        return $this->author;
    }

    public function activate()
    {
        $this->updatedAt = new \DateTime();
        $this->status = WebsiteStatus::ACTIVE;
    }

    public function getCreatedAt() : \DateTime
    {
        return $this->createdAt;
    }

    public function getStatus() : string
    {
        return (string) $this->status;
    }

    public function getUpdatedtAt() : \DateTime
    {
        return $this->updatedAt;
    }

    public function disable()
    {
        $this->updatedAt = new \DateTime();
        $this->status = WebsiteStatus::INACTIVE;
    }

    public function update(string $name, string $description, Author $author)
    {
        $this->updatedAt = new \DateTime();
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
    }
}
