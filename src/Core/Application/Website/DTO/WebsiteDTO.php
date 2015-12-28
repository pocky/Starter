<?php

namespace Black\Core\Application\Website\DTO;

class WebsiteDTO
{
    private $id;

    private $name;

    private $description;

    private $author;

    public function __construct($id, $name, $description, $author)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
    }

    public function getId()
    {
        return $this->id;
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
