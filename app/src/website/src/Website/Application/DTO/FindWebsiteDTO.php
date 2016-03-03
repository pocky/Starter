<?php

namespace Black\Website\Application\DTO;

class FindWebsiteDTO
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
