<?php

namespace Application\Website\Action;

use Black\Website\Application\Action\CreateWebsite as Action;
use Black\Website\Application\DTO\CreateWebsiteDTO;
use Black\Website\Domain\ValueObject\Author;
use Psr\Http\Message\ServerRequestInterface;
use Application\Website\Responder\CreateWebsite as Responder;

class CreateWebsite
{
    protected $action;

    protected $responder;

    public function __construct(
        Action $action,
        Responder $responder
    ) {
        $this->action = $action;
        $this->responder = $responder;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $data = json_decode($request->getBody()->getContents());
        $dto = new CreateWebsiteDTO(
            $data->name,
            $data->description,
            $data->author,
            $data->language
        );

        $author = new Author($dto->getAuthor());
        $this->action->__invoke($dto->getName(), $dto->getDescription(), $author, $dto->getLanguage());

        return $this->responder->__invoke();
    }
}
