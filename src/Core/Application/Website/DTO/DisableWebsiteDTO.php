<?php

namespace Black\Core\Application\Website\DTO;

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
