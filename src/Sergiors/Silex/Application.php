<?php
namespace Sergiors\Silex;

use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Application\UrlGeneratorTrait;
use Inbep\Silex\Provider\DoctrineOrmServiceProvider;
use Inbep\Silex\Provider\RoutingServiceProvider;
use Inbep\Silex\Provider\AnnotationServiceProvider;
use Inbep\Silex\Provider\SensioFrameworkExtraServiceProvider;
use Inbep\Silex\Provider\TemplatingServiceProvider;

class Application extends \Silex\Application
{
    use UrlGeneratorTrait;

    public function __construct()
    {
        parent::__construct();
        $app = $this;

        $app->register(new DoctrineServiceProvider());
        $app->register(new DoctrineOrmServiceProvider());
        $app->register(new RoutingServiceProvider());
        $app->register(new AnnotationServiceProvider());
        $app->register(new SensioFrameworkExtraServiceProvider());
        $app->register(new TwigServiceProvider());
        $app->register(new TemplatingServiceProvider());
        $app->register(new UrlGeneratorServiceProvider());
    }
}
