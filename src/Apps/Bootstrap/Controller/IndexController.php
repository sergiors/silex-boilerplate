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
     */
    public function indexAction(Application $app, Request $req)
    {
        return [
            'name' => $req->get('name', 'Woody')
        ];
    }
}
