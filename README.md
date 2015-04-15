Silex translation demo
======================

This simple project shows how to create simple multi langual websites using the
[Silex](http://silex.sensiolabs.org/) microframework.

First, install vendors using composer

    $ php composer.phar install

then start a webserver from the `web` directory

    $ cd web && php -S 0.0.0.0:<port>

now you can test a sample pre-registered route, `/{_locale}/hello/{name}` where `{_locale}` can be one of the two languages `en` or `it`, and `{name}` can be any string.
Fallback language is italian, so for example `/fr/hello/Fabien` will result in an italian translation.
