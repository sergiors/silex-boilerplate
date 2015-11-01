<?php
namespace Acme\Acme;

use Sergiors\Lullaby\Application as BaseApplication;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Application\UrlGeneratorTrait;
use Sergiors\Silex\Provider\DoctrineCacheServiceProvider;
use Sergiors\Silex\Provider\DoctrineOrmServiceProvider;
use Sergiors\Silex\Provider\RoutingServiceProvider;
use Sergiors\Silex\Provider\AnnotationServiceProvider;
use Sergiors\Silex\Provider\SensioFrameworkExtraServiceProvider;
use Sergiors\Silex\Provider\TemplatingServiceProvider;
use Symfony\Component\Config\Loader\LoaderInterface;

class Application extends BaseApplication
{
    use UrlGeneratorTrait;

    public function __construct($environment, $rootDir, array $values = [])
    {
        parent::__construct($environment, $rootDir, $values);
        $app = $this;

        $app->register(new MonologServiceProvider());
        $app->register(new DoctrineServiceProvider());
        $app->register(new DoctrineCacheServiceProvider());
        $app->register(new DoctrineOrmServiceProvider());
        $app->register(new AnnotationServiceProvider());
        $app->register(new TemplatingServiceProvider());
        $app->register(new RoutingServiceProvider());
        $app->register(new SensioFrameworkExtraServiceProvider());
        $app->register(new TwigServiceProvider());
        $app->register(new UrlGeneratorServiceProvider());
    }

    protected function registerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/app/config_'.$this->getEnvironment().'.yml');
    }
}
