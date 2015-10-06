<?php

namespace ParkBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

/**
 * Class ParkLoader
 * @package ParkBundle\DataFixtures\ORM
 */
class ParkLoader extends DataFixtureLoader
{

    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        //no fixtures for uv1, here to avoid useless error reporting on fixtures load
        return  array();
    }
}