<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Route("/{path}")
     * @Cache(maxage="6000",public="true")
     * @Template()
     */
    public function indexAction($path=null)
    {
        return array(
            "path" => $path,
        );
    }
}
