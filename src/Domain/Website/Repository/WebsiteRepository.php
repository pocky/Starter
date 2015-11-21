<?php

namespace Domain\Website\Repository;

use Domain\Website\Entity\Website;
use Domain\Website\ValueObject\WebsiteId;

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
