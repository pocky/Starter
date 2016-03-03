<?php

namespace Black\Website\Infrastructure\Service;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Infrastructure\Persistence\CQRS\WriteRepository;

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

    public function update
    (
        $name,
        $headline,
        $description,
        Author $author,
        Website $website
    ) {
        $website->update($name, $headline, $description, $author);
        $this->writeRepository->update($website);
    }
}
