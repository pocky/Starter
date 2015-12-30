<?php

namespace Black\Website\Application\DTO;

class DisableWebsiteDTO
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId() : int
    {
        return $this->id;
    }
}
