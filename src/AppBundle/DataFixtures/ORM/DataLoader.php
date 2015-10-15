<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 15/10/2015
 * Time: 15:25
 */

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;


class DataLoader extends DataFixtureLoader
{
    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        return  array(
            __DIR__ . '/user.yml',
        );
    }
}