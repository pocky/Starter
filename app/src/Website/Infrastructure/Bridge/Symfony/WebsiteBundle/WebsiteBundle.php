<?php

namespace Black\Bundle\WebsiteBundle;

use Black\Bundle\WebsiteBundle\DependencyInjection\BlackWebsiteExtension;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Console\Application;

/**
 * Class WebsiteBundle
 */
class WebsiteBundle extends Bundle
{
    /**
     * @return WebsiteExtension
     */
    public function getContainerExtension()
    {
        return new BlackWebsiteExtension();
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $mappings = array(
            realpath($this->getPath() . '/Resources/config/doctrine/entity') => 'Black\Website\Domain\Entity',
            realpath($this->getPath() . '/Resources/config/doctrine/valueobject') => 'Black\Website\Domain\ValueObject',
        );

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';

        if (class_exists($ormCompilerClass)) {
            $container->addCompilerPass(
                DoctrineOrmMappingsPass::createYamlMappingDriver(
                    $mappings,
                    [],
                    'black_website.backend_type_orm'
                ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function registerCommands(Application $application)
    {
        return;
    }
}
