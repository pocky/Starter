<?php

namespace Black\Website\Domain\Repository;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\ValueObject\WebsiteId;

/**
 * Class WebsiteRepository
 */
interface WebsiteRepository
{
    public function findAll();

    public function find(WebsiteId $id);

    public function add(Website $website);

    public function remove(Website $website);

    public function update(Website $website);

    public function getClassName() : string;
}
