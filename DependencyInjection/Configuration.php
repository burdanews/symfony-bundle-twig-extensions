<?php

namespace HBM\TwigExtensionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
  /**
   * {@inheritdoc}
   */
  public function getConfigTreeBuilder()
  {
    $treeBuilder = new TreeBuilder();
    $rootNode = $treeBuilder->root('hbm');

    $rootNode
      ->children()
        ->arrayNode('twig_extensions')
          ->children()
            ->arrayNode('base_url')
              ->children()
                ->scalarNode('images')->defaultValue('')->end()
                ->scalarNode('videos')->defaultValue('')->end()
              ->end()
            ->end()
            ->arrayNode('responsive_svg')->defaultValue(array())
              ->prototype('array')
                ->children()
                  ->scalarNode('path')->end()
                ->end()
              ->end()
            ->end()
          ->end()
        ->end()
      ->end()
    ->end();

    return $treeBuilder;
  }

}
