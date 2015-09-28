<?php
namespace Sergiors\Apps\Bootstrap\Controller;

use Silex\Application;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * @Route("/")
 */
class IndexController
{
    /**
     * @Route("/")
     * @Template("@Bootstrap/Index/index.html.twig")
     *
     * @param Application $app
     * @param Request $req
     */
    public function indexAction(Application $app, Request $req)
    {
        return [
            'name' => $req->get('name', 'Woody')
        ];
    }

    /**
     * @Route("/info")
     *
     * @param Application $app
     * @param Request $req
     */
    public function showAction(Application $app, Request $req)
    {
        return $app->json([
            'name' => $req->get('name', 'Woody')
        ]);
    }
}
