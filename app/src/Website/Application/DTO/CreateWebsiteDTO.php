<?php

namespace Black\Website\Application\DTO;

use Black\Website\Domain\ValueObject\Author;

class CreateWebsiteDTO
{
    private $name;

    private $description;

    private $author;

    private $language;

    public function __construct(
        string $name,
        string $description,
        string $author,
        string $language
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
        $this->language = $language;
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

    public function getLanguage() : string
    {
        return $this->language;
    }
}
