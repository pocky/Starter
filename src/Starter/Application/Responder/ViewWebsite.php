<?php

namespace Starter\Application\Responder;

use Black\Website\Application\DTO\WebsiteDTO;
use Black\Website\Application\Specification\WebsiteIsReadable;
use Starter\Domain\Entity\Website;
use Zend\Diactoros\Response\JsonResponse;

class ViewWebsite
{
    protected $specification;

    public function __construct(
        WebsiteIsReadable $specification
    ) {
        $this->specification = $specification;
    }

    public function __invoke(Website $website) : JsonResponse
    {
        if ($this->specification->isSatisfiedBy($website)) {

            $websiteDto = new WebsiteDTO(
                $website->getWebsiteId()->getValue(),
                $website->getName(),
                $website->getDescription(),
                $website->getAuthor()->getValue()
            );

            return new JsonResponse($websiteDto->serialize());
        }

        return new JsonResponse(["error" => "Website is not readable"]);
    }
}
