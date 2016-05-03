<?php
/**
 * This file is part of the <orientation> project.
 *
 * (c) <Kreactive>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * File name:  MailType.php
 * PHP version 5
 *
 * @category Product
 * @package  Application\Sonata\UserBundle\Form\Type
 * @author   Hao TAN <h.tan@kreactive.com>
 * @link     http://www.orientation.com
 */

namespace Application\Sonata\UserBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MailType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('mail','email');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Application\Sonata\UserBundle\Entity\NotificationMail',
                'csrf_protection' => false,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'application_user_notification_mail';
    }
}