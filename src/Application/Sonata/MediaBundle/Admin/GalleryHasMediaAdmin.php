<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\MediaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * Class GalleryHasMediaAdmin
 * @package Application\Sonata\MediaBundle\Admin
 */
class GalleryHasMediaAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $linkParameters = array();

        if ($this->hasParentFieldDescription()) {
            $linkParameters = $this->getParentFieldDescription()->getOption('link_parameters', array());
        }

        if ($this->hasRequest()) {
            $context = $this->getRequest()->get('context', null);

            if (null !== $context) {
                $linkParameters['context'] = $context;
            }
        }

        $formMapper
            ->add(
                'media',
                'sonata_type_model_list',
                array(
                    'required' => false,
                ),
                array(
                    'link_parameters' => $linkParameters,
                )
            )
            ->add('enabled', null, array('required' => false))
            ->add('position', 'hidden');
    }

    /**
     * @param  \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('media')
            ->add('gallery')
            ->add('position')
            ->add('enabled');
    }
}
