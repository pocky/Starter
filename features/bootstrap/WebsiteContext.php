<?php

/**
 * Defines application features from the specific context.
 */
class WebsiteContext extends DomainContext
{
    /**
     * @var \Infrastructure\Website\Persistence\InMemoryRepository
     */
    protected $repository;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        \org\bovigo\vfs\vfsStream::setup('cache');

        //$this->repository = new \Infrastructure\Website\Persistence\InMemoryRepository();
        $this->repository = new \Infrastructure\Website\Persistence\YamlRepository(\org\bovigo\vfs\vfsStream::url('cache/website.yml'));
    }

    /**
     * @Given I want to create a website with a :name, a :description and an :author
     */
    public function iWantToCreateAWebsiteWithANameADescriptionAndAnAuthor($name, $description, $author)
    {
        $websiteId = new Domain\Website\ValueObject\WebsiteId(1234);
        $author = new Domain\Website\ValueObject\Author($author);
        $website = new Domain\Website\Entity\Website($websiteId, $name, $description, $author);

        $websiteRepository = new Infrastructure\Website\Persistence\CQRS\WriteRepository($this->repository);
        $websiteRepository->add($website);

        $event = new Domain\Website\Event\WebsiteIsCreated($website);
    }

    /**
     * @Then I must have a website with id :identifier
     */
    public function iMustHaveAWebsiteWithId($identifier)
    {
        $websiteId = new Domain\Website\ValueObject\WebsiteId($identifier);

        $websiteRepository = new Infrastructure\Website\Persistence\CQRS\ReadRepository($this->repository);
        $website = $websiteRepository->find($websiteId);
    }
}
