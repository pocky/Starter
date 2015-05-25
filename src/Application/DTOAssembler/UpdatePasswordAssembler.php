<?php
/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Application\DTOAssembler;

use Black\DDD\DDDinPHP\Application\DTO\DTO;
use Black\DDD\DDDinPHP\Application\DTO\Assembler;
use Black\DDD\DDDinPHP\Domain\Model\Entity;
use Documents\User;

/**
 * Class UpdatePasswordAssembler
 */
class UpdatePasswordAssembler implements Assembler
{
    /**
     * @var
     */
    protected $entityClass;
    
    /**
     * @var
     */
    protected $dtoClass;
    
    /**
     * @param $entityClass
     * @param $dtoClass
     */
    public function __construct($entityClass, $dtoClass)
    {
        $this->entityClass = $entityClass;
        $this->dtoClass    = $dtoClass;
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
            null
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
