<?php

namespace spec\Application\DTOAssembler;

use Black\Component\User\Domain\Model\UserId;
use Email\EmailAddress;
use PhpSpec\ObjectBehavior;

class ShowUserAccountAssemblerSpec extends ObjectBehavior
{
    protected $entityClass;

    protected $dtoClass;

    function it_is_initializable()
    {
        $this->shouldImplement('Black\DDD\DDDinPHP\Application\DTO\Assembler');
    }

    function let()
    {
        $this->entityClass = 'Black\Component\User\Domain\Model\User';
        $this->dtoClass    = 'Black\Component\User\Application\DTO\ShowUserAccountDTO';

        $this->beConstructedWith($this->entityClass, $this->dtoClass);
    }

    function it_should_transform()
    {
        $entity = new $this->entityClass(new UserId(1), 'test', new EmailAddress('test@test.com'));
        $this->transform($entity)->shouldReturnAnInstanceOf($this->dtoClass);
    }

    function it_should_reverseTransform()
    {
        $dto = new $this->dtoClass(1, 'test', 'test@test.com');
        $this->reverseTransform($dto)->shouldReturnAnInstanceOf($this->entityClass);
    }
}
