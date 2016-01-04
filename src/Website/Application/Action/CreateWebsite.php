<?php

namespace Black\Website\Application\Action;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Bus;
use Black\Website\Application\DTO\CreateWebsiteDTO;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Infrastructure\CQRS\Command\CreateWebsiteCommand;
use Black\Website\Infrastructure\CQRS\Handler\CreateWebsiteHandler;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class CreateWebsite
{
    protected $bus;

    public function __construct(Bus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke($name, $description, Author $author)
    {
        $command = new CreateWebsiteCommand($name, $description, $author);
        $this->bus->handle($command);
    }
}
