<?php

namespace Application\Website\Responder;

use Zend\Diactoros\Response\JsonResponse;

class CreateWebsite
{
    public function __invoke() : JsonResponse
    {
        return new JsonResponse([ "success" => true]);
    }
}