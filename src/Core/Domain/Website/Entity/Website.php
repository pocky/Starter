<?php

namespace Black\Core\Domain\Website\Entity;

use Black\Core\Domain\Website\ValueObject\Author;
use Black\Core\Domain\Website\ValueObject\WebsiteId;

class Website
{
    protected $id;

    protected $websiteId;

    protected $name;

    protected $description;

    protected $author;

    protected $createdAt;

    protected $status;

    protected $updatedAt;

    public function __construct(WebsiteId $websiteId, $name, $description, Author $author)
    {
        $this->websiteId = $websiteId;
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
        $this->createdAt = new \DateTime();
        $this->status = WebsiteStatus::INACTIVE;
    }

    public function getId()
    {
        return $this->id;
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

    public function activate()
    {
        $this->updatedAt = new \DateTime();
        $this->status = WebsiteStatus::ACTIVE;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getStatus()
    {
        return (string) $this->status;
    }

    public function getUpdatedtAt()
    {
        return $this->updatedAt;
    }

    public function disable()
    {
        $this->updatedAt = new \DateTime();
        $this->status = WebsiteStatus::INACTIVE;
    }

    public function update($name, $description, Author $author)
    {
        $this->updatedAt = new \DateTime();
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
    }
}
