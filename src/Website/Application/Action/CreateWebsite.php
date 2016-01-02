<?php

namespace Black\Website\Application\Action;

use Black\Website\Application\DTO\CreateWebsiteDTO;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Infrastructure\CQRS\Command\CreateWebsiteCommand;
use Black\Website\Infrastructure\CQRS\Handler\CreateWebsiteHandler;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Black\Website\Application\Responder\CreateWebsite as Responder;

class CreateWebsite
{
    protected $responder;

    protected $handler;

    public function __construct(
        Responder $responder,
        CreateWebsiteHandler $handler
    ) {
        $this->responder = $responder;
        $this->handler = $handler;
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
        $command = new CreateWebsiteCommand($dto->getName(), $dto->getDescription(), $author);

        $this->handler->handle($command);

        return $this->responder->__invoke();
    }
}
