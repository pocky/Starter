<?php

namespace Black\Website\Infrastructure\Persistence\CQRS;

use Black\Website\Domain\Repository\WebsiteRepository;
use Black\Website\Domain\ValueObject\WebsiteId;

class ReadRepository
{
    protected $repository;

    public function __construct(WebsiteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find(WebsiteId $id)
    {
        return $this->repository->find($id);
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }
}
