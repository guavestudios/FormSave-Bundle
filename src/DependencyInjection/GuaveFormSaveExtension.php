<?php

declare(strict_types=1);

namespace Guave\FormSaveBundle\DependencyInjection;

use Guave\FormSaveBundle\Config\Config;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class GuaveFormSaveExtension extends ConfigurableExtension
{
    /**
     * @param array<string> $mergedConfig
     */
    public function loadInternal(array $mergedConfig, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../config')
        );
        $loader->load('services.yaml');

        $configDefinition = $container->getDefinition(Config::class);
        $configDefinition->setArgument(0, $mergedConfig);
    }
}
