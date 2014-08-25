<?php
/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Component\Common\Infrastructure\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;

abstract class AbstractManager implements Manager
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    /**
     * @param ObjectManager $om
     * @param $class
     */
    public function __construct(ObjectManager $om, $class)
    {
        $this->manager    = $om;
        $this->repository = $om->getRepository($class);
        $metadata         = $om->getClassMetadata($class);
        $this->class      = $metadata->getName();
    }

    /**
     * @return ObjectManager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @return mixed|void
     */
    public function flush()
    {
        $this->manager->flush();
    }

    /**
     * @return string
     */
    protected function getClass()
    {
        return $this->class;
    }
} 