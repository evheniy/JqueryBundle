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
        if (isset($configs[0]['html5']) && empty($configs[0]['html5'])) {
            $container->setParameter('jquery.html5', false);
        } else {
            $container->setParameter('jquery.html5', true);
        }
        if (!empty($configs[0]['async'])) {
            $container->setParameter('jquery.async', true);
        } else {
            $container->setParameter('jquery.async', false);
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
