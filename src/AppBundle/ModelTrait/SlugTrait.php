<?php
namespace AppBundle\ModelTrait;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Created by PhpStorm.
 * User: htan
 * Date: 04/05/2016
 * Time: 18:08
 */
trait SlugTrait{

    /**
     * @Gedmo\Slug(fields={"name"}, updatable=true, unique=true)
     * @ORM\Column(length=200, unique=true)
     * @Assert\Regex("/^[a-z0-9\-]+/")
     */
    protected $slug;

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
}