<?php
use Acme\Acme\Application;
use Silex\Provider\MonologServiceProvider;

require_once __DIR__.'/../bootstrap.php';

$app = new Application(APP_ENV, dirname(__DIR__));

if ('dev' === APP_ENV) {
    $app['debug'] = true;
    $app->register(new MonologServiceProvider());
}

$app['twig.loader.filesystem']->addPath(__DIR__.'/../src/Apps/Bootstrap/Resources/views', 'Bootstrap');

$app->run();
