<?php

namespace ParkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/test_param", name="ParkHome", defaults={"name" = "world"})
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route(
     *     "/test_param/{title}/{param}",
     *     name="ParkTest",
     *     defaults={"title" = "test","param" = "0000"},
     *     requirements={
     *         "title": "^[A-Za-z]+",
     *         "param": "^[0-9]+"
     *     }
     * )
     * @Template()
     */
    public function testAction($title,$param)
    {
        return array('title' => $title,'param' => $param);
    }
}
