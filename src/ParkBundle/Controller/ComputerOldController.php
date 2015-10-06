<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 05/10/2015
 * Time: 14:44
 */
namespace ParkBundle\Controller;

use ParkBundle\Entity\Computer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ComputerOldController extends Controller
{
    /**
     * @Route("/park_computer", name="park_computer")
     * @Template()
     */
    public function listAction()
    {
        //No data
        //return array("computers" => null);
        //List of computers
        return array("computers" => $this->get('park.computerManager')->getComputerList());
    }


}