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
 * @ORM\Entity(repositoryClass="Application\Sonata\MediaBundle\EntityRepository\GalleryRepository")
 * @ORM\Table( name="media__gallery")
 */
class Gallery extends BaseGallery implements Sluggable
{
    use SlugTrait;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $createdBy
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\Column(type="string",nullable=true)
     */
    protected $createdBy;

    /**
     * @var integer
     * @ORM\Column(name="list_order",nullable=true)
     */
    protected $listOrder;

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

    public function getListOrder()
    {
        return $this->listOrder;
    }

    public function setListOrder($order)
    {
        $this->listOrder = $order;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name ?: "-";
    }
}