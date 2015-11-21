<?php

namespace spec\Application\Website\DTO;

use Domain\Website\Entity\Website;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActiveWebsiteDTOSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Website\DTO\ActiveWebsiteDTO');
    }

    function let(Website $website)
    {
        $this->beConstructedWith($website);
    }

    function it_should_have_an_id()
    {
        $this->getWebsite()->beAnInstanceOf('Domain\Website\Entity\Website');
    }
}
