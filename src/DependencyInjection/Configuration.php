<?php

namespace Guave\FormSaveBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('guave_form_save');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('quote')->defaultValue('"')->end()
                ->scalarNode('separator')->defaultValue(',')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
