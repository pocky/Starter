<?php

namespace Application\Website\DTO;

class CreateWebsiteDTO
{
    private $name;

    private $description;

    private $author;

    public function __construct($name, $description, $author)
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
