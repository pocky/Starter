<?php

namespace spec\Domain\Website\Repository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebsiteRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\Website\Repository\WebsiteRepository');
    }
}
