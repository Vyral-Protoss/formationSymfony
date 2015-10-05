<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 05/10/2015
 * Time: 14:44
 */
namespace ParkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ComputerController extends Controller
{
    /**
     * @Route("/park_computer", name="park_computer")
     * @Template()
     */
    public function listAction()
    {
        //List of computers
        return array("computers" => $this->getComputerList());
        //No data
        //return array("computers" => null);
    }


    protected function getComputerList()
    {
        return array(
            0 => array(
                    "id" => "1",
                    "name" => "test",
                    "ip" => "0.0.0.0",
                    "enabled" => true
            ),
            1 => array(
                    "id" => "2",
                    "name" => "toto",
                    "ip" => "1.1.1.1",
                    "enabled" => false
            ),
            2 => array(
                'id' => 3,
                'name' => 'Ordinateur 3',
                'ip' => '192.168.0.3',
                'enabled' => true
            ),
                    3 => array(
                'id' => 4,
                'name' => 'Ordinateur 4',
                'ip' => '192.168.0.4',
                'enabled' => false
            ),
                    4 => array(
                'id' => 5,
                'name' => 'Ordinateur 5',
                'ip' => '192.168.0.5',
                'enabled' => true
            )
        );
    }
}