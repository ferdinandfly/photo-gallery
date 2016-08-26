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
use FOS\RestBundle\Controller\Annotations\View;

class ApiController extends FOSRestController
{


    /**
     * @Get("/gallery", name="get_gallery", options={ "method_prefix" = false })
     * @Cache(maxage="6000",public="true")
     * @View()
     */
    public function getGalleriesAction()
    {
        $galleries = $this->getDoctrine()->getManager()->getRepository('ApplicationSonataMediaBundle:Gallery')->getAllByListOrder();
        return $this->view($galleries);
    }

    /**
     * @Get("/gallery/{slug}", name="get_gallery_media", options={ "method_prefix" = false })
     * @Cache(maxage="6000",public="true")
     * @View()
     */
    public function getGalleryAction($slug)
    {
        $gallery = $this->getDoctrine()->getManager()->getRepository('ApplicationSonataMediaBundle:Gallery')->findOneBySlug($slug);
        return $gallery->getGalleryHasMedias();
    }
    /**
     * @Get("/media/{id}")
     * @Cache(maxage="6000",public="true")
     * @View()
     */
    public function getMediaAction($id)
    {
        return $this->getDoctrine()->getManager()->getRepository('ApplicationSonataMediaBundle:Media')->find($id);

    }
}