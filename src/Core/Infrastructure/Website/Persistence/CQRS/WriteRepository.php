<?php

namespace Black\Core\Infrastructure\Website\Persistence\CQRS;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\Repository\WebsiteRepository;

class WriteRepository
{
    protected $repository;

    public function __construct(WebsiteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(Website $website)
    {
        $this->repository->add($website);
    }

    public function update(Website $website)
    {
        $this->repository->update($website);
    }
}
