<?php
use Acme\Acme\Application;

require_once __DIR__.'/../bootstrap.php';

$app = new Application(APP_ENV, dirname(__DIR__), [
    'debug' => APP_ENV === 'dev'
]);

$app['twig.loader.filesystem']->addPath(__DIR__.'/../src/Apps/Bootstrap/Resources/views', 'Bootstrap');

$app->run();
