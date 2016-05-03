<?php
/**
 * This file is part of the <orientation> project.
 *
 * (c) <Kreactive>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * File name:  ManagerAdmin.php
 * PHP version 5
 *
 * @category Product
 * @package  Application\Sonata\UserBundle\Admin
 * @author   Hao TAN <h.tan@kreactive.com>
 * @link     http://www.orientation.com
 */

namespace Application\Sonata\UserBundle\Admin;


use Application\Sonata\UserBundle\Entity\Manager;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class ManagerAdmin extends Admin
{

    /**
     * {@inheritdoc}
     */
    public function prePersist($entity)
    {
        $this->preUpdate($entity);
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($entity){
        if($entity instanceof Manager){
            $entity->setUsers($entity->getUsers());
        }
    }
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('users')
            ->add('email','text');
    }
    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper->add('email');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('email');
    }
}