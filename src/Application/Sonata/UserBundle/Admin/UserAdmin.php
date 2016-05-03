<?php
/**
 * Created by PhpStorm.
 * User: htan
 * Date: 9/9/14
 * Time: 11:17 AM
 */

namespace Application\Sonata\UserBundle\Admin;

use Application\Sonata\UserBundle\Entity\User;
use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * Class UserAdmin
 * @package Application\Sonata\UserBundle\Admin
 */
class UserAdmin extends BaseUserAdmin
{

    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
        $this->preUpdate($object);
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {
        if ($object instanceof User) {
            $object->setNotificationMails($object->getNotificationMails());
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('General')
            ->with('General')
            ->add('username')
            ->add('email')
            ->add('plainPassword', 'text', array('required' => false))
            ->add(
                'logo',
                'sonata_media_type',
                array(
                    'provider' => 'sonata.media.provider.image',
                    'context' => 'default',
                    'required' => false,
                    'new_on_update' => false,
                )
            )
            ->add('mailNotification')
            ->add('notificationType','choice',
                array(
                    'choices' => User::$notificationTypeArray,
                    'required' => true,
                    'empty_value' => "form.notification_type.empty_value",
                    'label' => 'form.notification_type.label',
                ))
            ->add('notificationMails','sonata_type_collection',array(),array(
                'edit' => 'inline',
                'inline' => 'table',
            ))
            ->add(
                'expiresAt',
                'datetime',
                array(
                    'required' => true,
                    'input' => 'datetime',
                    'widget' => 'single_text',
                    'format' => 'dd-MM-yyyy HH:mm',
                    "attr" => array('class' => 'date_time_selector span4'),
                )
            )
            ->end()
            ->end()
            ->tab('Groups')
            ->with('Groups')
            ->add(
                'groups',
                'sonata_type_model',
                array(
                    'required' => false,
                    'expanded' => true,
                    'multiple' => true,
                )
            )
            ->end()
            ->end()
        ;

        if ($this->getSubject() && !$this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
            $formMapper
                ->tab('management')
                ->with('Management')
                ->add('locked', null, array('required' => false))
                ->add('expired', null, array('required' => false))
                ->add('enabled', null, array('required' => false))
                ->add(
                    'mailNotification',
                    null,
                    array(
                        'label' => "Mail notifications",
                    )
                )
                ->add('credentialsExpired', null, array('required' => false))
                ->end()
            ->end();
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper
            ->add('id')
            ->add('username')
            ->add('expired')
            ->add('email');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('enabled', null, array('editable' => true))
            ->add('expired')
            ->add('createdAt')
            ->add('expiresAt');

        if ($this->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            $listMapper
                ->add(
                    'impersonating',
                    'string',
                    array('template' => 'SonataUserBundle:Admin:Field/impersonating.html.twig')
                );
        }
    }
} 