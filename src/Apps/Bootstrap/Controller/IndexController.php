<?php
namespace Acme\Apps\Bootstrap\Controller;

use Silex\Application;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class IndexController
{
    /**
     * @Route("/")
     * @Template("@Bootstrap/Index/index.html.twig")
     *
     * @param Request $req
     * @return array
     */
    public function indexAction(Request $req)
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
     * @return array
     */
    public function showAction(Application $app, Request $req)
    {
        return $app->json([
            'name' => $req->get('name', 'Woody')
        ]);
    }
}
