<?php

namespace spec\Black\Website\Application\DTO;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DisableWebsiteDTOSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Application\DTO\DisableWebsiteDTO');
    }

    function let()
    {
        $this->beConstructedWith(1234);
    }

    function it_should_have_an_id()
    {
        $this->getId()->shouldReturn(1234);
    }
}
