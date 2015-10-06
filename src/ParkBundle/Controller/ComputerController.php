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

class ComputerController extends Controller
{
    /**
     * @Route("/park_computer", name="park_computer")
     * @Template()
     */
    public function listAction()
    {
        $en = $this->getDoctrine()->getManager();
        //No data
        //return array("computers" => null);
        //List of computers
        return array("computers" => $this->getDoctrine()->getRepository('ParkBundle:Computer')->findAll());
    }


    protected function getComputerList()
    {
        return array(
            0 => array(
                "name" => "Ordinateur 1",
                "ip" => "192.168.0.1",
                "enabled" => true
            ),
            1 => array(
                "name" => "Ordinateur 2",
                "ip" => "192.168.0.2",
                "enabled" => false
            ),
            2 => array(
                'name' => 'Ordinateur 3',
                'ip' => '192.168.0.3',
                'enabled' => true
            ),
                    3 => array(
                'name' => 'Ordinateur 4',
                'ip' => '192.168.0.4',
                'enabled' => false
            ),
                    4 => array(
                'name' => 'Ordinateur 5',
                'ip' => '192.168.0.5',
                'enabled' => true
            )
        );
    }

    /**
     * @Route("/park_test_add", name="park_test_add")
     * @Template()
     */
    public function testAddAction()
    {
        $en = $this->getDoctrine()->getManager();
        foreach($this->getComputerList() as $computer){
            $testComp = new Computer();
            $testComp->setName($computer['name']);
            $testComp->setIp($computer['ip']);
            $testComp->setEnabled($computer['enabled']);
            $en->persist($testComp);
        }
        $en->flush();

        die;
    }

    /**
     * @Route("/park_test_remove", name="park_test_remove")
     * @Template()
     */
    public function testRemoveAction()
    {
        $en = $this->getDoctrine()->getManager();
        foreach($this->getDoctrine()->getRepository('ParkBundle:Computer')->findAll() as $computer){
            //suppression
            $en->remove($computer);
        }
        //commit
        $en->flush();

        die;
    }

}