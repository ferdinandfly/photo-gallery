<?php
/**
 * This file is part of the <orientation> project.
 *
 * (c) <Kreactive>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * File name:  NotificationMailAdmin.php
 * PHP version 5
 *
 * @category Product
 * @package  Application\Sonata\UserBundle\Admin
 * @author   Hao TAN <h.tan@kreactive.com>
 * @link     http://www.orientation.com
 */

namespace Application\Sonata\UserBundle\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\Admin;

class NotificationMailAdmin extends Admin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('mail');
    }
}