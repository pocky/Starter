<?php

namespace Black\Website\Infrastructure\Persistence\CQRS;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Repository\WebsiteRepository;

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
