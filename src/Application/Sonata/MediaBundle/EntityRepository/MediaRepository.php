<?php
/**
 * Created by PhpStorm.
 * User: htan
 * Date: 5/9/14
 * Time: 3:44 PM
 */

namespace Application\Sonata\MediaBundle\EntityRepository;

use Doctrine\ORM\EntityRepository;

/**
 * Class MediaRepository
 * @package Application\Sonata\MediaBundle\EntityRepository
 */
class MediaRepository extends EntityRepository
{
    /**
     * @param  string $username
     * @return \Doctrine\ORM\Query
     */
    public function getPartnerQuery($username)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select(array('m'))
            ->from('ApplicationSonataMediaBundle:Media', 'm')
            ->where('m.createdBy = :username')
            ->setParameter('username', $username);

        return $qb->getQuery();
    }
}