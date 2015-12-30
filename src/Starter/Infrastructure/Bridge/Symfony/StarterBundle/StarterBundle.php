<?php

namespace Starter\Bundle\StarterBundle;

use Starter\Bundle\StarterBundle\DependencyInjection\StarterExtension;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Console\Application;

/**
 * Class StarterBundle
 */
class StarterBundle extends Bundle
{
    /**
     * @return StarterExtension
     */
    public function getContainerExtension()
    {
        return new StarterExtension();
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $mappings = array(
            realpath($this->getPath() . '/Resources/config/doctrine/entity') => 'Starter\Domain\Entity',
        );

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';

        if (class_exists($ormCompilerClass)) {
            $container->addCompilerPass(
                DoctrineOrmMappingsPass::createYamlMappingDriver(
                    $mappings,
                    [],
                    'starter.backend_type_orm'
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
