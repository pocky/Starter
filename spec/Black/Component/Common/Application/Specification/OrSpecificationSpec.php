<?php

namespace spec\Black\Component\Common\Application\Specification;

use PhpSpec\ObjectBehavior;
use Black\DDD\DDDinPHP\Application\Specification\Specification;

class OrSpecificationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Black\Component\Common\Application\Specification\OrSpecification');
        $this->shouldImplement('Black\DDD\DDDinPHP\Application\Specification\Specification');
    }

    public function let()
    {
        $s1 = new SpecificationTest(true);
        $s2 = new SpecificationTest(false);

        $this->beConstructedWith($s1, $s2);
    }

    public function it_should_be_satisfied_by()
    {
        $subject = true;
        $this->isSatisfiedBy($subject)->shouldReturn(true);
    }
}
