<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 07/10/2015
 * Time: 14:55
 */

namespace ParkBundle\Entity;


class IpRepository extends \Doctrine\ORM\EntityRepository
{

    public function getUnaffectedIps() {
        return $this
            ->createQueryBuilder('i')
            ->andWhere('i.computer is null');

    }
}