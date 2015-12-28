<?php

namespace spec\Black\Core\Application\Website\DTO;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateWebsiteDTOSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Application\Website\DTO\CreateWebsiteDTO');
    }
}
