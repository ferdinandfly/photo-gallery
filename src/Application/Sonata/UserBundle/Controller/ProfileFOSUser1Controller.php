<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Controller;

use Application\Sonata\UserBundle\Form\Type\ProfileType;
use Sonata\UserBundle\Form\Handler\ProfileFormHandler;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\FOSUserEvents;

/**
 * This class is inspired from the FOS Profile Controller, except :
 *   - only twig is supported
 *   - separation of the user authentication form with the profile form
 */
class ProfileFOSUser1Controller extends Controller
{
    /**
     * @return Response
     *
     * @throws AccessDeniedException
     */
    public function showAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

//        return $this->redirect($this->generateUrl('sonata_admin_dashboard'));

        return $this->render('ApplicationSonataUserBundle:Profile:show.html.twig', array(
            'user'   => $user,
            'blocks' => $this->container->getParameter('sonata.user.configuration.profile_blocks'),
            'admin_pool'    => $this->container->get('sonata.admin.pool')

            ));
    }

    /**
     * @return Response
     *
     * @throws AccessDeniedException
     */
    public function editAuthenticationAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->container->get('sonata.user.authentication.form');
        $formHandler = $this->container->get('sonata.user.authentication.form_handler');

        $process = $formHandler->process($user);
        if ($process) {
            $this->setFlash('sonata_user_success', 'profile.flash.updated');

            return new RedirectResponse($this->generateUrl('sonata_user_profile_show'));
        }

        return $this->render(
            'ApplicationSonataUserBundle:Profile:edit_authentication.html.twig',
            array(
                'form' => $form->createView(),
                'admin_pool' => $this->container->get('sonata.admin.pool'),
            )
        );
    }

    /**
     * @return Response
     *
     * @throws AccessDeniedException
     */
    public function editProfileAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->createForm(new ProfileType(), $user);
        $formHandler = new ProfileFormHandler($form, $this->getRequest(), $this->get('sonata.user.user_manager'));

        $process = $formHandler->process($user);
        if ($process) {
            $this->setFlash('sonata_user_success', 'profile.flash.updated');

            return new RedirectResponse($this->generateUrl('sonata_user_profile_show'));
        }

        return $this->render(
            'ApplicationSonataUserBundle:Profile:edit_profile.html.twig',
            array(
                'form' => $form->createView(),
                'breadcrumb_context' => 'user_profile',
                'admin_pool' => $this->container->get('sonata.admin.pool'),
            )
        );
    }

    /**
     * @param string $action
     * @param string $value
     */
    protected function setFlash($action, $value)
    {
        $this->container->get('session')->getFlashBag()->set($action, $value);
    }
}
