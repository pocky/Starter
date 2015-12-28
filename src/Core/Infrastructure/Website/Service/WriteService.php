<?php

namespace Black\Core\Infrastructure\Website\Service;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\ValueObject\Author;
use Black\Core\Infrastructure\Website\Persistence\CQRS\WriteRepository;

class WriteService
{
    private $writeRepository;

    public function __construct(WriteRepository $writeRepository)
    {
        $this->writeRepository = $writeRepository;
    }

    public function createWebsite(Website $website)
    {
        $this->writeRepository->add($website);
    }

    public function activate(Website $website)
    {
        $website->activate();
        $this->writeRepository->update($website);
    }

    public function disable(Website $website)
    {
        $website->disable();
        $this->writeRepository->update($website);
    }

    public function update($name, $description, Author $author, Website $website)
    {
        $website->update($name, $description, $author);
        $this->writeRepository->update($website);
    }
}
