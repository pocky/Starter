<?php

namespace Infrastructure\Website\CQRS;

use Domain\Website\ValueObject\Author;
use Domain\Website\Entity\Website;

class UpdateWebsiteCommand
{
    private $name;

    private $description;

    private $author;

    private $website;

    public function __construct($name, $description, Author $author, Website $website)
    {
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
        $this->website = $website;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getWebsite()
    {
        return $this->website;
    }
}
