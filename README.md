JqueryBundle
=================

This bundle provides jQuery with Symfony2

Documentation
-------------

You can change jQuery version in parameters:

    jquery:
        version: 1.11.1

You can use old html version in parameters:

    jquery:
        html5: false

Default value: true. If false script will be with type="text/javascript"

You can use async loading in parameters:

    jquery:
        async: true

Default value: false. If true script will be with async="async"

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

        #JqueryBundle
        jquery:
            version: 1.11.1
            html5: true
            async: false


    {% include "JqueryBundle:Jquery:jquery.html.twig" %}

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE
