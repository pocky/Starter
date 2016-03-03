<?php

namespace Black\Website\Infrastructure\CQRS\Command;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Command;
use Black\Website\Domain\ValueObject\Author;

class CreateWebsiteCommand implements Command
{
    private $name;

    private $headline;

    private $description;

    private $author;

    private $language;

    public function __construct(
        string $name,
        string $headline,
        string $description,
        Author $author,
        string $language
    ) {
        $this->name = $name;
        $this->headline = $headline;
        $this->description = $description;
        $this->author = $author;
        $this->language = $language;
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

    public function getAuthor() : Author
    {
        return $this->author;
    }

    public function getLanguage() : string
    {
        return $this->language;
    }
}
