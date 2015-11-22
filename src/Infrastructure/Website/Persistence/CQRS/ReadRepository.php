<?php

namespace Infrastructure\Website\Persistence\CQRS;

use Domain\Website\Repository\WebsiteRepository;
use Domain\Website\ValueObject\WebsiteId;

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
