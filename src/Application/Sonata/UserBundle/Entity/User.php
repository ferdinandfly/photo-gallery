<?php

/**
 * This file is part of the <orientation> project.
 *
 * (c) <Hao TAN> <h.tan@kreactive.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Kreactive\OrientationModelBundle\Validator\Constraints as KreactiveAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="fos_user_user")
 * @ORM\Entity(repositoryClass="Application\Sonata\UserBundle\EntityRepository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

}
