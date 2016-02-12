<?php

namespace Application\Website\Action;

use Black\Website\Application\Action\DisableWebsite as Action;
use Black\Website\Application\DTO\DisableWebsiteDTO;
use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Infrastructure\Service\ReadService;
use Psr\Http\Message\ServerRequestInterface;
use Application\Website\Responder\DisableWebsite as Responder;

class DisableWebsite
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
        $dto = new DisableWebsiteDTO($data->id);

        $website = $this->service->find(new WebsiteId($dto->getId()));
        $this->action->__invoke($website);

        return $this->responder->__invoke();
    }
}
