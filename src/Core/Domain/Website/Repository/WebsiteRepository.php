<?php

namespace Black\Core\Domain\Website\Repository;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\ValueObject\WebsiteId;

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
}
