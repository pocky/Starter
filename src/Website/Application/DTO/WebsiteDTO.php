<?php

namespace Black\Website\Application\DTO;

use Black\Website\Domain\ValueObject\Author;

class WebsiteDTO
{
    private $id;

    private $name;

    private $description;

    private $author;

    public function __construct(int $id, string $name, string $description, string $author)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
    }

    public function getId() : int
    {
        return $this->id;
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
