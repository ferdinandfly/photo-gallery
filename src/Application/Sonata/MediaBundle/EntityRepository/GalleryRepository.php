<?php
/**
 * Created by PhpStorm.
 * User: htan
 * Date: 5/9/14
 * Time: 3:45 PM
 */

namespace Application\Sonata\MediaBundle\EntityRepository;

use Doctrine\ORM\EntityRepository;

/**
 * Class GalleryRepository
 * @package Application\Sonata\MediaBundle\EntityRepository
 */
class GalleryRepository extends EntityRepository
{
    /**
     * @param string $username
     * @return \Doctrine\ORM\Query
     */
    public function getPartnerQuery($username)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select(array('g'))
            ->from('ApplicationSonataMediaBundle:Gallery', 'g')
            ->where('g.createdBy = :username')
            ->setParameter('username', $username);

        return $qb->getQuery();
    }
} 