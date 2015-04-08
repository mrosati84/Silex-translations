<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Translation\Loader\YamlFileLoader;

$app = new Silex\Application();

// register service providers
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__ . '/../views'));
$app->register(new Silex\Provider\TranslationServiceProvider(), array('locale_fallbacks' => array('it')));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app['debug'] = true;

$app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());
    $translator->addResource('yaml', __DIR__ . '/../locales/en.yml', 'en');
    return $translator;
}));

// register routes
$app->get('/{_locale}/hello/{name}', function ($name) use ($app) {
    return $app['twig']->render('index.twig', array(
        'name' => $name,
    ));
})->bind('hello');

$app->run();
