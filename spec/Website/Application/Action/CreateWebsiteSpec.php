<?php

namespace spec\Black\Website\Application\Action;

use Black\Website\Application\Responder\CreateWebsite;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Stream;

class CreateWebsiteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Application\Action\CreateWebsite');
    }

    function let(CreateWebsite $responder)
    {
        $responder->__invoke(["name" => "test"]);
        $this->beConstructedWith($responder);
    }

    function it_should_create_a_website(ServerRequestInterface $request, StreamInterface $stream)
    {
        $data = json_encode(["name" => "test"]);

        $stream->getContents()->willReturn($data);
        $request->getBody()->willReturn($stream);

        $this->__invoke($request)->shouldBeAnInstanceOf('Zend\Diactoros\Response\JsonResponse');
    }
}
