<?php

namespace Black\Core\Infrastructure\Website\Persistence;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\Repository\WebsiteRepository;
use Black\Core\Domain\Website\ValueObject\Author;
use Black\Core\Domain\Website\ValueObject\WebsiteId;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

class YamlRepository implements WebsiteRepository
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        (new Filesystem())->touch($filename);
    }

    public function findAll() : array
    {
        $websites = [];

        foreach ($this->getRows() as $row) {
            $websites[] = new Website(
                new WebsiteId($row['id']),
                $row['name'],
                $row['description'],
                new Author($row['author'])
            );
        }

        return $websites;
    }

    public function add(Website $website)
    {
        $rows = [];

        foreach ($this->getRows() as $row) {
            if ($website->getWebsiteId()->isEqualTo(new WebsiteId($row['id']))) {
                continue;
            }

            $rows[] = $row;
        }

        $rows[] = [
            'id' => $website->getWebsiteId()->getValue(),
            'name' => $website->getName(),
            'description' => $website->getDescription(),
            'author' => $website->getAuthor()->getValue(),
            'createdAt' => $website->getCreatedAt()->format('r'),
            'status' => $website->getStatus()
        ];

        file_put_contents($this->filename, Yaml::dump($rows));
    }

    public function remove(Website $website)
    {
        $rows = [];

        foreach ($this->getRows() as $row) {
            if ($website->getWebsiteId()->isEqualTo(new WebsiteId($row['id']))) {
                continue;
            }

            $rows[] = $row;
        }

        file_put_contents($this->filename, Yaml::dump($rows));
    }

    public function find(WebsiteId $websiteId)
    {
        foreach ($this->findAll() as $website) {
            if ($website->getWebsiteId()->isEqualTo($websiteId)) {
                return $website;
            }
        }
    }

    public function update(Website $website)
    {
        $rows = [];

        foreach ($this->getRows() as $row) {
            if ($website->getWebsiteId()->isEqualTo(new WebsiteId($row['id']))) {
                $row['id'] = $website->getWebsiteId()->getValue();
                $row['name'] = $website->getName();
                $row['description'] = $website->getDescription();
                $row['author'] = $website->getAuthor()->getValue();
                $row['createdAt'] = $website->getCreatedAt()->format('r');
                $row['status'] = $website->getStatus();
                $row['updatedAt'] = $website->getUpdatedtAt()->format('r');
            }

            $rows[] = $row;
        }

        file_put_contents($this->filename, Yaml::dump($rows));
    }

    private function getRows()
    {
        $file = file_get_contents($this->filename);
        return Yaml::parse($file) ?: array();
    }
}
