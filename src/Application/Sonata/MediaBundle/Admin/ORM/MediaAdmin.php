<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\MediaBundle\Admin\ORM;

use Application\Sonata\MediaBundle\Admin\BaseMediaAdmin as Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

/**
 * Class MediaAdmin
 * @package Application\Sonata\MediaBundle\Admin\ORM
 */
class MediaAdmin extends Admin
{
    public function getUser()
    {
        $container = $this->getConfigurationPool()->getContainer();
        if (!$container->has('security.token_storage')) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        if (null === $token = $container->get('security.token_storage')->getToken()) {
            return;
        }

        if (!is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return;
        }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $securityContext = $this->getConfigurationPool()->getContainer()->get('security.authorization_checker');
        if ($securityContext->isGranted('ROLE_ADMIN') && !$securityContext->isGranted('ROLE_SUPER_ADMIN')) {
            $username = $securityContext->getToken()->getUser()->getUsername();
            $query->andWhere($query->getRootAlias().'.createdBy = :username');
            $query->setParameter('username', $username); // eg get fromsecurity context
        }

        return $query;
    }


    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
        $object->setCreatedBy($this->getUser());
        $this->preUpdate($object);
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {

    }

    /**
     * @param  \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('providerReference')
            ->add('enabled')
            ->add('context')
        ;

        $providers = array();

        $providerNames = (array) $this->pool->getProviderNamesByContext($this->getPersistentParameter('context', $this->pool->getDefaultContext()));
        foreach ($providerNames as $name) {
            $providers[$name] = $name;
        }

        $datagridMapper->add('providerName', 'doctrine_orm_choice', array(
            'field_options'=> array(
                'choices' => $providers,
                'required' => false,
                'multiple' => false,
                'expanded' => false,
            ),
            'field_type'=> 'choice',
        ));
    }
}
