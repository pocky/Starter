<?php

namespace Black\Website\Infrastructure\CQRS\Command;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Command;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Domain\Entity\Website;

class UpdateWebsiteCommand implements Command
{
    private $name;

    private $headline;

    private $description;

    private $author;

    private $website;

    public function __construct(
        string $name,
        string $headline,
        string $description,
        Author $author,
        Website $website
    ) {
        $this->name = $name;
        $this->headline = $headline;
        $this->description = $description;
        $this->author = $author;
        $this->website = $website;
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

    public function getWebsite() : Website
    {
        return $this->website;
    }
}
