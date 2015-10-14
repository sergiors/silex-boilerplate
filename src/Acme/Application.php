<?php
namespace Acme\Acme;

use Sergiors\Lullaby\Application as BaseApplication;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Application\UrlGeneratorTrait;
use Inbep\Silex\Provider\DoctrineOrmServiceProvider;
use Inbep\Silex\Provider\RoutingServiceProvider;
use Inbep\Silex\Provider\AnnotationServiceProvider;
use Inbep\Silex\Provider\SensioFrameworkExtraServiceProvider;
use Inbep\Silex\Provider\TemplatingServiceProvider;
use Symfony\Component\Config\Loader\LoaderInterface;

class Application extends BaseApplication
{
    use UrlGeneratorTrait;

    public function __construct($environment, $rootDir, array $values = [])
    {
        parent::__construct($environment, $rootDir, $values);
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

    public function registerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->rootDir.'/app/config_'.$this->environment.'.yml');
    }
}
