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

    protected $cache;

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
        $service = new Infrastructure\Website\Service\WriteService($websiteRepository);
        $service->createWebsite($website);

        $event = new Domain\Website\Event\WebsiteIsCreated($website);
    }

    /**
     * @Then I must have a website with id :identifier
     */
    public function iMustHaveAWebsiteWithId($identifier)
    {
        $websiteId = new Domain\Website\ValueObject\WebsiteId($identifier);

        $websiteRepository = new Infrastructure\Website\Persistence\CQRS\ReadRepository($this->repository);
        $service = new Infrastructure\Website\Service\ReadService($websiteRepository);
        $website = $service->find($websiteId);
    }

    /**
     * @Given I have a website
     */
    public function iHaveAWebsite()
    {
        $websiteId = new Domain\Website\ValueObject\WebsiteId(1234);
        $author = new Domain\Website\ValueObject\Author("John Doe");
        $this->website = new Domain\Website\Entity\Website($websiteId, "name2", "description", $author);

        $websiteRepository = new Infrastructure\Website\Persistence\CQRS\WriteRepository($this->repository);
        $this->service = new Infrastructure\Website\Service\WriteService($websiteRepository);
        $this->service->createWebsite($this->website);
    }

    /**
     * @Then I want to active my website
     */
    public function iWantToActiveMyWebsite()
    {
        $this->service->activate($this->website);

        $event = new Domain\Website\Event\WebsiteIsActivated($this->website);
    }

    /**
     * @Given my website can be read by a visitor
     */
    public function myWebsiteCanBeReadByAVisitor()
    {
        $specification = new Application\Website\Specification\WebsiteIsReadable();

        if ($specification->isSatisfiedBy($this->website)) {
            $this->website;
        }
    }

    /**
     * @Then I want to disable my website
     */
    public function iWantToDisableMyWebsite()
    {
        $this->service->disable($this->website);
        $event = new Domain\Website\Event\WebsiteIsDisabled($this->website);
    }

    /**
     * @Given my website can't be read by a visitor
     */
    public function myWebsiteCantBeReadByAVisitor()
    {
        $specification = new Application\Website\Specification\WebsiteIsReadable();

        $specification->isSatisfiedBy($this->website);
    }
}
