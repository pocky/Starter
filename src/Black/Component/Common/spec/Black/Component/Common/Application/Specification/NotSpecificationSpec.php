<?php

namespace spec\Black\Component\Common\Application\Specification;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Black\DDD\DDDinPHP\Application\Specification\Specification;

class NotSpecificationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType
        ('Black\Component\Common\Application\Specification\NotSpecification');
        $this->shouldImplement('Black\DDD\DDDinPHP\Application\Specification\Specification');
    }

    function let()
    {
        $s = new SpecificationTest(true);
        $this->beConstructedWith($s);
    }

    function it_should_be_satisfied_by()
    {
        $subject = true;
        $this->isSatisfiedBy($subject)->shouldReturn(false);
    }
}
