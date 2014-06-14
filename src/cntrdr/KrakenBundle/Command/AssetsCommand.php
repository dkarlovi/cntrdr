<?php
namespace cntrdr\KrakenBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AssetsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('kraken:assets')
            ->setDescription('Update Kraken assets');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $krakenClient = $this->getContainer()->get('cntrdr.kraken.client');
        
        $res = $krakenClient->getAssets();
        print_r($res);
    }
}