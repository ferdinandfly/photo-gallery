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