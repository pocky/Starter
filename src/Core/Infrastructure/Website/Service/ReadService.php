<?php

namespace Black\Core\Infrastructure\Website\Service;

use Black\Core\Domain\Website\ValueObject\WebsiteId;
use Black\Core\Infrastructure\Website\Persistence\CQRS\ReadRepository;

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

    public function listWebsites()
    {
        return $this->readRepository->findAll() ? $this->readRepository->findAll() : [];
    }
}
