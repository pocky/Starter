<?php

namespace Black\Core\Infrastructure\Website\Persistence\CQRS;

use Black\Core\Domain\Website\Repository\WebsiteRepository;
use Black\Core\Domain\Website\ValueObject\WebsiteId;

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
