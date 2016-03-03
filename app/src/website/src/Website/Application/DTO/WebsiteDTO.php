<?php

namespace Black\Website\Application\DTO;

use Black\Website\Domain\ValueObject\Author;

class WebsiteDTO
{
    private $id;

    private $name;

    private $headline;

    private $description;

    private $author;

    public function __construct(
        string $id,
        string $name,
        string $headline,
        string $description,
        string $author
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->headline = $headline;
        $this->description = $description;
        $this->author = $author;
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getHeadline() : string
    {
        return $this->headline;
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
