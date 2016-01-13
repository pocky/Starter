<?php

namespace Starter\Application\Responder;

use Black\Website\Application\DTO\WebsiteDTO;
use Black\Website\Application\Specification\WebsiteIsReadable;
use Starter\Domain\Entity\Website;
use Symfony\Component\Serializer\Serializer;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;

class ViewWebsite
{
    protected $specification;

    protected $serializer;

    public function __construct(
        WebsiteIsReadable $specification,
        Serializer $serializer
    ) {
        $this->specification = $specification;
        $this->serializer = $serializer;
    }

    public function __invoke(Website $website) : Response
    {
        if ($this->specification->isSatisfiedBy($website)) {

            $response = new Response("php://memory", 200, ["Content-Type" => "application/json"]);
            $response->getBody()->write($this->serializer->serialize($website, "json"));

            return $response;
        }

        return new JsonResponse(["error" => "Website is not readable"], 404);
    }
}
