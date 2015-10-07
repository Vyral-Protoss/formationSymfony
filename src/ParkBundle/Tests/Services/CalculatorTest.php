<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 07/10/2015
 * Time: 11:40
 */
namespace ParkBundle\Tests;

use ParkBundle\Services\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testSomme()
    {
        $calc = new Calculator();
        $result = $calc->somme(30, 12);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }
}