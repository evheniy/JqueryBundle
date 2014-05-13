<?php

namespace Evheniy\JqueryBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class JqueryExtension
 *
 * @package Evheniy\JqueryBundle\Twig
 */
class JqueryExtension extends \Twig_Extension
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        return array(
            'jquery' => $this->container->getParameter('jquery.version')
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'jquery';
    }
}
