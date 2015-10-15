<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 07/10/2015
 * Time: 10:37
 */

namespace ParkBundle\Services;


class Calculator
{
    public function somme($a,$b) {
        return $a+$b;
    }

    public function division($a,$b) {
        if ($b == 0){
            return 0;
        } else {
            return $a/$b;
        }
    }
}