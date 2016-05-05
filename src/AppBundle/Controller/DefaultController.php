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
     * @Cache(maxage="6000",public="true")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $galleries = $this->getDoctrine()->getManager()->getRepository('ApplicationSonataMediaBundle:Gallery')->findAll();
        return array("galleries" => $galleries);
    }
    /**
     * @Route("/gallery/{slug}", name="app_gallery", requirements={"slug" = "[0-9a-z\-]+"})
     * @Cache(maxage="6000",public="true")
     * @Template()
     */
    public function galleryAction($slug)
    {
        $gallery = $this->getDoctrine()->getManager()->getRepository('ApplicationSonataMediaBundle:Gallery')->findOneBySlug($slug);
        $galleries = $this->getDoctrine()->getManager()->getRepository('ApplicationSonataMediaBundle:Gallery')->findAll();
        return array("gallery" => $gallery, "galleries" => $galleries);
    }
}
