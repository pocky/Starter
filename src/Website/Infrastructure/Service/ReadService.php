<?php

namespace Black\Website\Infrastructure\Service;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Infrastructure\Persistence\CQRS\ReadRepository;

class ReadService
{
    private $readRepository;

    public function __construct(ReadRepository $readRepository)
    {
        $this->readRepository = $readRepository;
    }

    public function find(WebsiteId $id)
    {
        return $this->readRepository->find($id);
    }

    public function listWebsites() : array
    {
        return $this->readRepository->findAll() ? $this->readRepository->findAll() : [];
    }
}
