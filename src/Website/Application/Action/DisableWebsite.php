<?php

namespace Black\Website\Application\Action;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Bus;
use Black\Website\Application\DTO\CreateWebsiteDTO;
use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Infrastructure\CQRS\Command\DisableWebsiteCommand;
use Psr\Http\Message\ServerRequestInterface;

class DisableWebsite
{
    protected $bus;

    public function __construct(Bus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(Website $website)
    {
        $command = new DisableWebsiteCommand($website);
        $this->bus->handle($command);
    }
}
