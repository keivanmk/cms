<?php

namespace App\Content;
use App\Content\Infrastructure\DependencyInjection\ContentExtension;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContentBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }

    protected function getContainerExtensionClass(): string
    {
        return ContentExtension::class;
    }


}