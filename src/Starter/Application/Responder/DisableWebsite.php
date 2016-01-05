<?php

namespace Starter\Application\Responder;

use Zend\Diactoros\Response\JsonResponse;

class DisableWebsite
{
    public function __invoke() : JsonResponse
    {
        return new JsonResponse([ "success" => true]);
    }
}
