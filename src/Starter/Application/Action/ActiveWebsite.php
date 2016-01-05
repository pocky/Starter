<?php

namespace Starter\Application\Action;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Bus;
use Black\Website\Application\Action\ActiveWebsite as Action;
use Black\Website\Application\DTO\ActiveWebsiteDTO;
use Black\Website\Application\DTO\CreateWebsiteDTO;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Infrastructure\CQRS\Command\CreateWebsiteCommand;
use Black\Website\Infrastructure\Service\ReadService;
use Psr\Http\Message\ServerRequestInterface;
use Starter\Application\Responder\ActiveWebsite as Responder;

class ActiveWebsite
{
    protected $action;

    protected $service;

    protected $responder;

    public function __construct(
        Action $action,
        ReadService $service,
        Responder $responder
    ) {
        $this->action = $action;
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $data = json_decode($request->getBody()->getContents());
        $dto = new ActiveWebsiteDTO($data->id);

        $website = $this->service->find(new WebsiteId($dto->getId()));
        $this->action->__invoke($website);

        return $this->responder->__invoke();
    }
}
