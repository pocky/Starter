<?php

namespace Starter\Application\Action;

use Black\DDD\CQRSinPHP\Infrastructure\CQRS\Bus;
use Black\Website\Application\Action\CreateWebsite as Action;
use Black\Website\Application\DTO\CreateWebsiteDTO;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Infrastructure\CQRS\Command\CreateWebsiteCommand;
use Psr\Http\Message\ServerRequestInterface;
use Starter\Application\Responder\CreateWebsite as Responder;

class CreateWebsite
{
    protected $action;

    protected $responder;

    public function __construct(
        Action $action,
        Responder $responder
    ) {
        $this->responder = $responder;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $data = json_decode($request->getBody()->getContents());
        $dto = new CreateWebsiteDTO(
            $data->name,
            $data->description,
            $data->author
        );

        $author = new Author($dto->getAuthor());
        $this->action->__invoke($dto->getName(), $dto->getDescription(), $author);

        return $this->responder->__invoke();
    }
}
