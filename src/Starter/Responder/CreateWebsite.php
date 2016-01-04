<?php

namespace Starter\Application\Responder;

use Zend\Diactoros\Response\JsonResponse;

class CreateWebsite
{
    public function __invoke() : JsonResponse
    {
        return new JsonResponse([
            "success" => true
        ]);
    }
}
