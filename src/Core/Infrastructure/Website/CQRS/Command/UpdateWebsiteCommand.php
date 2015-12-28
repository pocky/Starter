<?php

namespace Black\Core\Infrastructure\Website\CQRS\Command;

use Black\Core\Domain\Website\ValueObject\Author;
use Black\Core\Domain\Website\Entity\Website;

class UpdateWebsiteCommand
{
    private $name;

    private $description;

    private $author;

    private $website;

    public function __construct(string $name, string $description, Author $author, Website $website)
    {
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
        $this->website = $website;
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

    public function getWebsite() : Website
    {
        return $this->website;
    }
}
