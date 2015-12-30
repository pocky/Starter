<?php

namespace Starter\Domain\Entity;

use Black\Website\Domain\Entity\Website as BaseWebsite;

class Website extends BaseWebsite
{
    protected $id;

    public function getId() : int
    {
        return $this->id;
    }
}
