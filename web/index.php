<?php
use Sergiors\Silex\Application;
use Silex\Provider\MonologServiceProvider;

require_once __DIR__.'/../bootstrap.php';

$app = new Application();

$app['debug'] = true;
$app['routing.resources'] = __DIR__.'/../config/routing.yml';
$app['orm.auto_generate_proxy_classes'] = true;
$app['orm.proxy_dir'] = __DIR__.'/../tmp/proxies';

$app['db.options'] = [
    'driver' => 'pdo_pgsql',
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'dbname' => '',
    'driverOptions' => [
        \PDO::ATTR_EMULATE_PREPARES => false,
        \PDO::ATTR_STRINGIFY_FETCHES => false
    ]
];

$app['orm.options'] = [
    'mappings' => [
        [
            'type' => 'annotation',
            'namespace' => 'Sergiors\Sergiors\Entity',
            'path' => __DIR__.'/../src/Sergiors/Entity'
        ]
    ]
];

$app['twig.loader.filesystem']->addPath(__DIR__.'/../src/Apps/Bootstrap/Resources/views', 'Bootstrap');

if ($app['debug'] && class_exists('Monolog\Logger')) {
    $app->register(new MonologServiceProvider(), [
        'monolog.logfile' => 'php://stdout'
    ]);
}

$app->run();
