<?php

namespace Domain\Website\Entity;

use Black\Website\Domain\Entity\Website as BaseWebsite;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Domain\ValueObject\WebsiteId;
use Rhumsaa\Uuid\Uuid;

class Website extends BaseWebsite
{
    protected $id;

    public function __construct(
        WebsiteId $websiteId,
        $name,
        $headline,
        $description,
        Author $author,
        $language
    ) {
        $this->id = Uuid::uuid4();
        parent::__construct($websiteId, $name, $headline, $description, $author, $language);
    }

    public function getId()
    {
        return $this->id;
    }
}
