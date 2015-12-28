<?php

namespace Black\Core\Application\Website\DTO;

class DisableWebsiteDTO
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
