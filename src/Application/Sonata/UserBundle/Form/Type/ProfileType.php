<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Application\Sonata\UserBundle\Form\Type;

use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ProfileType
 * @package Application\Sonata\UserBundle\Form\Type
 */
class ProfileType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'mailNotification',
                null,
                array(
                    'required' => false,
                    'label' => 'bo.user.notification',
                )
            )
            ->add('notificationType','choice',
                array(
                    'choices' => User::$notificationTypeArray,
                    'required' => true,
                    'label' => 'bo.user.notification_type.label',
                ))
            ->add('notificationMails','collection',array(
                'type' => new MailType(),
                'allow_add' => 'true',
                'allow_delete' => 'true',
                'prototype' => true,
                'prototype_name' => 'notification__mail__',
                'options' => array(
                    'attr' => array(
                        'class' => "col-xs-9",
                    ),
                ),

            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Application\Sonata\UserBundle\Entity\User',
                'csrf_protection' => false,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'application_user_profile';
    }
}
