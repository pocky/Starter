<?php

namespace spec\Black\Core\Domain\Website\ValueObject;

use Black\Core\Domain\Website\ValueObject\WebsiteId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebsiteIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Domain\Website\ValueObject\WebsiteId');
    }

    function let()
    {
        $this->beConstructedWith(1234);
    }

    function it_should_have_a_value()
    {
        $this->getValue()->shouldReturn("1234");
    }

    function it_should_be_equal()
    {
        $id = new WebsiteId(1234);
        $this->isEqualTo($id)->shouldReturn(true);
    }
}
