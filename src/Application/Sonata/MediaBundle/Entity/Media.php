<?php

namespace Application\Sonata\MediaBundle\Entity;

use Sonata\MediaBundle\Entity\BaseMedia as BaseMedia;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Media
 * @package Application\Sonata\MediaBundle\Entity
 */
class Media extends BaseMedia
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $createdBy
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\Column(type="string")
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
     * Set createdBy
     *
     * @param string $createdBy
     * @return Institute
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
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

    public function __toString()
    {
        return $this->name;
    }

    public function setBinaryContent($binaryContent)
    {
        if ($this->providerReference) {
            $this->previousProviderReference = $this->providerReference;
        }
        $this->providerReference = null;
        $this->binaryContent = $binaryContent;
    }
}