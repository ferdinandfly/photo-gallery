<?php

namespace Application\Sonata\MediaBundle\Entity;

use Sonata\MediaBundle\Entity\BaseMedia as BaseMedia;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Media
 * @package Application\Sonata\MediaBundle\Entity
 * @ORM\Entity(repositoryClass="Application\Sonata\MediaBundle\EntityRepository\MediaRepository")
 * @ORM\Table( name="media__media")
 */
class Media extends BaseMedia
{
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

    public function getReferenceUrl(){
        if($this){
            global $kernel;
            $service = $kernel->getContainer()->get($this->getProviderName());
            return $service->generatePublicUrl($this,'reference');
        }
    }
}