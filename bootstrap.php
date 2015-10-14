<?php
use Doctrine\Common\Annotations\AnnotationRegistry;

if (!$loader = require_once __DIR__.'/vendor/autoload.php') {
    throw new \RuntimeException('You need to install dependencies using Composer.');
}

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

if (!defined('APP_ENV')) {
    define('APP_ENV', ($env = getenv('APP_ENV')) ? $env : 'dev');
}
