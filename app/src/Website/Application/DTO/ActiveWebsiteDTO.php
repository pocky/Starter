<?php

namespace Black\Website\Application\DTO;

class ActiveWebsiteDTO
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId() : string
    {
        return $this->id;
    }
}
