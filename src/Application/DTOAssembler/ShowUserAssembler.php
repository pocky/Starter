<?php

namespace Application\DTOAssembler;

use Black\DDD\DDDinPHP\Application\DTO\Assembler;
use Black\DDD\DDDinPHP\Application\DTO\DTO;
use Black\DDD\DDDinPHP\Domain\Model\Entity;

class ShowUserAssembler implements Assembler
{
    protected $entityClass;

    protected $dtoClass;

    public function __construct($entityClass, $dtoClass)
    {
        $this->entityClass = $entityClass;
        $this->dtoClass = $dtoClass;
    }

    /**
     * @param  Entity $user
     * @return mixed
     */
    public function transform(Entity $user)
    {
        $this->verify($user, $this->entityClass);

        $dto = new $this->dtoClass(
            $user->getUserId()->getValue(),
            $user->getName(),
            $user->getEmail()->getValue()
        );

        return $dto;
    }

    /**
     * @param DTO $dto
     * @return mixed
     * @throws \Exception
     */
    public function reverseTransform(DTO $dto)
    {
        $this->verify($dto, $this->dtoClass);

        return $dto;
    }

    /**
     * @param $object
     * @param $class
     *
     * @throws \Exception
     */
    protected function verify($object, $class)
    {
        if (!$object instanceof $class) {
            throw new \Exception();
        }
    }
}
