<?php

namespace spec\Black\Core\Application\Website\DTO;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DisableWebsiteDTOSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Application\Website\DTO\DisableWebsiteDTO');
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
