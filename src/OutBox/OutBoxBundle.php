<?php

namespace App\OutBox;
use App\OutBox\DependencyInjection\OutBoxExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class OutBoxBundle extends Bundle
{

    protected function getContainerExtensionClass(): string
    {
        return OutBoxExtension::class;
    }
}