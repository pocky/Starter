<?php

namespace Infrastructure\Website\Service;

use Domain\Website\Entity\Website;
use Infrastructure\Website\Persistence\CQRS\WriteRepository;

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
}
