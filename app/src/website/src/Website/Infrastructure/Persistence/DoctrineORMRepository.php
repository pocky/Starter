<?php

namespace Black\Website\Infrastructure\Persistence;

use Black\Bridge\Doctrine\Common\Persistence\ORMRepository;
use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\Repository\WebsiteRepository;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Domain\ValueObject\WebsiteId;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

class DoctrineORMRepository extends ORMRepository implements WebsiteRepository
{
    public function findAll()
    {
        return $this->getQueryBuilder()->getQuery()->execute();
    }

    public function find(WebsiteId $id)
    {
        $query = $this->getQueryBuilder()
            ->where('p.websiteId.value = :id')
            ->setParameter('id', $id->getValue())
            ->getQuery();

        try {
            return $query->getSingleResult();
        } catch (NoResultException $exception) {
            return null;
        }
    }

    public function add(Website $website)
    {
        $this->manager->persist($website);
        $this->manager->flush();
    }

    public function remove(Website $website)
    {
        $this->manager->remove($website);
        $this->manager->flush();
    }

    public function update(Website $website)
    {
        $this->manager->flush();
    }
}
