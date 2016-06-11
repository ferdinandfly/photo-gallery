<?php
/**
 * Created by PhpStorm.
 * User: haiminwang
 * Date: 10/06/2016
 * Time: 22:52
 */

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use FOS\RestBundle\Controller\Annotations\Get;

class ApiController extends FOSRestController
{


    /**
     * @Get("/gallery", name="get_gallery", options={ "method_prefix" = false })
     * @Cache(maxage="6000",public="true")
     */
    public function getGalleriesAction()
    {
        $galleries = $this->getDoctrine()->getManager()->getRepository('ApplicationSonataMediaBundle:Gallery')->findAll();
        return $this->handleView($this->view($galleries));
    }

    /**
     * @Get("/gallery/{slug}", name="get_gallery_media", options={ "method_prefix" = false })
     * @Cache(maxage="6000",public="true")
     */
    public function getGalleryAction($slug)
    {
        $gallery = $this->getDoctrine()->getManager()->getRepository('ApplicationSonataMediaBundle:Gallery')->findOneBySlug($slug);
        return $this->handleView($this->view($gallery->getGalleryHasMedias()));
    }
}