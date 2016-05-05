<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\MediaBundle\Entity;

use AppBundle\ModelTrait\SlugTrait;
use Sonata\MediaBundle\Entity\BaseGallery as BaseGallery;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Sluggable\Sluggable;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Gallery
 * @package Application\Sonata\MediaBundle\Entity
 * @ORM\Entity(repositoryClass="Application\Sonata\MediaBundle\Entity\EntityRepository\GalleryRepository")
 */
class Gallery extends BaseGallery implements Sluggable
{
    use SlugTrait;

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $createdBy
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\Column(type="string",nullable=true)
     */
    protected $createdBy;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get updatedBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name ?: "-";
    }
}