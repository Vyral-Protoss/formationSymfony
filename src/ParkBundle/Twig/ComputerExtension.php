<?php

namespace ParkBundle\Twig;

/**
 * Class ComputerStatusExtension
 * @package ParkBundle\Twig
 */
class ComputerExtension extends \Twig_Extension
{

    /**
     * @param \Twig_Environment $env
     * @param $status
     * @return string
     */
    public function renderComputerStatus(\Twig_Environment $env, $status)
    {
        //return processed template content
        return $env->render(
            'ParkBundle:Computer:Status/index.html.twig',
            array(
                'status' => (bool)$status,
            )
        );
    }

    public function renderComputerName($name)
    {
        //return processed template content
        return strtoupper(substr($name,0,1)).substr($name,1,strlen($name)-1);
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'computer_status',
                array($this, 'renderComputerStatus'),
                array(
                    'is_safe' => array('html'),
                    'needs_environment' => true
                )
            ),
            new \Twig_SimpleFilter(
                'computer_name',
                array($this, 'renderComputerName'),
                array(
                    'is_safe' => array('html')
                )
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'park_computer_status_extension';
    }
}
