<?php

namespace Black\Bundle\CoreBundle;

use Black\Bundle\CoreBundle\DependencyInjection\BlackCoreExtension;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Console\Application;

/**
 * Class CoreBundle
 */
class CoreBundle extends Bundle
{
    /**
     * @return CoreExtension
     */
    public function getContainerExtension()
    {
        return new BlackCoreExtension();
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $mappings = array(
            realpath($this->getPath() . '/Resources/config/doctrine/entity') => 'Black\Core\Domain\Website\Entity',
            realpath($this->getPath() . '/Resources/config/doctrine/valueobject') => 'Black\Core\Domain\Website\ValueObject',
        );

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';

        if (class_exists($ormCompilerClass)) {
            $container->addCompilerPass(
                DoctrineOrmMappingsPass::createYamlMappingDriver(
                    $mappings,
                    [],
                    'black_core.backend_type_orm'
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
