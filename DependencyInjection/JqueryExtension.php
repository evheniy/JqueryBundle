<?php

namespace Evheniy\JqueryBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * Class JqueryExtension
 *
 * @package Evheniy\JqueryBundle\DependencyInjection
 */
class JqueryExtension extends Extension
{
    /**
     * @see Symfony\Component\DependencyInjection\Extension.ExtensionInterface::load()
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        if (isset($configs[0]['version'])) {
            $container->setParameter('jquery.version', $configs[0]['version']);
        } else {
            $container->setParameter('jquery.version', '1.11.1');
        }
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__
        . '/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * @see Symfony\Component\DependencyInjection\Extension.ExtensionInterface::getAlias()
     * @codeCoverageIgnore
     */
    public function getAlias()
    {
        return 'jquery';
    }
}
