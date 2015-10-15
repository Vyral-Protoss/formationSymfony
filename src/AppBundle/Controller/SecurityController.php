<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Security controller.
 *
 * @Route("/")
 */
class SecurityController extends Controller
{
    /**
     * Login.
     *
     * @Route("/login", name="security_login")
     *
     *
     */
    public function loginAction()
    {

        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'AppBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * Login check.
     *
     * @Route("/login_check", name="security_login_check")
     *
     *
     */
    public function loginCheckAction()
    {
        if (!$this->get('security.authorization_checker')) {
            throw $this->createAccessDeniedException('Unable to access this page!');
        }
    }

    /**
     * Logout.
     *
     * @Route("/logout", name="security_logout")
     *
     *
     */
    public function logoutAction()
    {

    }

}
