<?php

namespace Application\Action;

use Black\Website\Application\DTO\FindWebsiteDTO;
use Black\Website\Domain\ValueObject\WebsiteId;
use Black\Website\Infrastructure\Service\ReadService;
use Application\Responder\ViewWebsite as Responder;

class ViewWebsite
{
    protected $service;

    protected $responder;

    public function __construct(
        ReadService $service,
        Responder $responder
    ) {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke($id)
    {
        $dto = new FindWebsiteDTO($id);

        $website = $this->service->find(new WebsiteId($dto->getId()));

        return $this->responder->__invoke($website);
    }
}
