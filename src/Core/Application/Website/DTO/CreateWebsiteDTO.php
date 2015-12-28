<?php

namespace Black\Core\Application\Website\DTO;

use Black\Core\Domain\Website\ValueObject\Author;

class CreateWebsiteDTO
{
    private $name;

    private $description;

    private $author;

    public function __construct(string $name, string $description, string $author)
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

    public function getAuthor() : string
    {
        return $this->author;
    }
}
