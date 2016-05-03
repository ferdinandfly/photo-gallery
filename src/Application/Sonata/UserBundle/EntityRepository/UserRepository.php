<?php
/**
 * This file is part of the <orientation> project.
 *
 * (c) <Kreactive>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * File name:  UserRepository.php
 * PHP version 5
 *
 * @category Product
 * @package  Application\Sonata\UserBundle\EntityRepository
 * @author   Hao TAN <h.tan@kreactive.com>
 * @link     http://www.orientation.com
 */

namespace Application\Sonata\UserBundle\EntityRepository;
use Doctrine\ORM\EntityRepository;


class UserRepository extends EntityRepository
{
    public function getExpiredUsers(\DateTime $date)
    {
        $lastDay = clone $date;
        $lastDay->modify('-1 day');
        $qb = $this->getEntityManager()->createQueryBuilder();
        return $qb->select('u')
            ->from('ApplicationSonataUserBundle:User','u')
            ->andWhere('u.expiresAt < :date')
            ->andWhere('u.expiresAt > :lastDay')
            ->setParameter('date',$date)
            ->setParameter('lastDay',$lastDay)
            ->getQuery()->getResult()
        ;
    }
}