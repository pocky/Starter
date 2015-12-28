<?php

namespace Black\Core\Infrastructure\Website\CQRS\Command;

use Black\Core\Domain\Website\ValueObject\Author;

class CreateWebsiteCommand
{
    private $name;

    private $description;

    private $author;

    public function __construct(string $name, string $description, Author $author)
    {
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
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
}
