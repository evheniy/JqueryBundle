JqueryBundle
=================

This bundle provides jQuery with Symfony2

Documentation
-------------

You can change jQuery version in parameters:

    jquery:
        version: 1.11.0

Installation
------------

    AppKernel:
        public function registerBundles()
            {
                $bundles = array(
                    ...
                    new Evheniy\JqueryBundle\JqueryBundle(),
                );
                ...

    config.yml:
        #JqueryBundle
        jquery: ~

        or

        jquery:
            version: 1.11.1


    {% include "JqueryBundle:Jquery:jquery.html.twig" %}

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE
