<?php
use Doctrine\Common\Annotations\AnnotationRegistry;

$loaderPath = __DIR__.'/vendor/autoload.php';

if (!is_readable($loaderPath)) {
    throw new \RuntimeException('You must execute "composer install".');
}

$loader = require_once $loaderPath;
AnnotationRegistry::registerLoader([$loader, 'loadClass']);

if (!defined('APP_ENV')) {
    define('APP_ENV', ($env = getenv('APP_ENV')) ? $env : 'development');
}
