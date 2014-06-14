<?php
namespace cntrdr\KrakenBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BalanceCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('kraken:balance')
            ->setDescription('Update Kraken balance');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $krakenClient = $this->getContainer()->get('cntrdr.kraken.client');
        
        $res = $krakenClient->getBalance();
        print_r($res);
    }
}