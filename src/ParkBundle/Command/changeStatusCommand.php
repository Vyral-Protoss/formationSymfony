<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 06/10/2015
 * Time: 14:40
 */

namespace ParkBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use ParkBundle\Entity\Computer;

class ChangeStatusCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('changeStatus')
            ->setDescription('change computer status')
            ->addArgument(
                'status',
                InputArgument::REQUIRED,
                'enable or disable ?'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $status = $input->getArgument('status');
        if ($status == 'enable') {
            $output->writeln($this->changeStat(true));
        }
        elseif ($status == 'disable'){
            $output->writeln($this->changeStat(false));
        }
        else {
            $output->writeln('error : wrong argument');
        }
    }

    private function changeStat($stat) {
        $en = $this->getContainer()->get('doctrine')->getManager();
        $cnt = 0;
        foreach ($this->getContainer()->get('doctrine')->getRepository('ParkBundle:Computer')->findAll() as $computer)
        {
            $cnt += 1;
            $computer->setEnabled($stat);
            $en->persist($computer);
        }
        $en->flush();
        return $cnt.' computer\'s status changed';
    }

}