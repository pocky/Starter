<?php

namespace Black\Core\Infrastructure\Website\CQRS;

use Black\Core\Domain\Website\ValueObject\Author;

class CreateWebsiteCommand
{
    private $name;

    private $description;

    private $author;

    public function __construct($name, $description, Author $author)
    {
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
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
}
