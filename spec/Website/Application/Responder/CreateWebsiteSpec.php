<?php

namespace spec\Black\Website\Application\Responder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateWebsiteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Application\Responder\CreateWebsite');
    }

    function it_should_respond_to_create_action()
    {
        $data = ["name" => "test"];

        $this->__invoke($data)->shouldBeAnInstanceOf('Zend\Diactoros\Response\JsonResponse');
        $this->__invoke($data)->getStatusCode()->shouldReturn(200);
    }
}
