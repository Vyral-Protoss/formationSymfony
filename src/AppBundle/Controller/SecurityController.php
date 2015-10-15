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
     * Lists all Computer entities.
     *
     * @Route("/login", name="login")
     *
     * @Template()
     */
    public function loginAction()
    {

        return array(
            'login' => null,
        );
    }
}
