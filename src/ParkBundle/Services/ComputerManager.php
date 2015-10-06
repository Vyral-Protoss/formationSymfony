<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 06/10/2015
 * Time: 15:45
 */

namespace ParkBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;

class ComputerManager
{
    protected $em;
    public function __construct(Registry $em)
    {
        $this->em = $em;
    }

    public function getComputerList() {
        return $this->em->getEntityManager()->getRepository('ParkBundle:Computer')->findAll();
    }
}