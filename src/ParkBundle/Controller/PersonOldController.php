<?php

namespace ParkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PersonOldController extends Controller
{
    /**
     * @Route("/park_person", name="park_person")
     * @Template()
     */
    public function listAction()
    {
        $en = $this->getDoctrine()->getManager();

        //No data
        //return array("persons" => null);
        return array("persons" => $this->getDoctrine()->getRepository('ParkBundle:Person')->findAll());
    }
}
