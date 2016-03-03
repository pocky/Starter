<?php

namespace Black\Website\Application\Action;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Bus;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Infrastructure\CQRS\Command\CreateWebsiteCommand;

class CreateWebsite
{
    protected $bus;

    public function __construct(Bus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(string $name, string $description, Author $author, string $language)
    {
        $command = new CreateWebsiteCommand($name, $description, $author, $language);
        $this->bus->handle($command);
    }
}
