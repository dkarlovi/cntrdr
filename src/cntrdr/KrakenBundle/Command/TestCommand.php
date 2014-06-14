<?php
namespace cntrdr\KrakenBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('kraken:test')
            ->setDescription('Test Kraken API');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $krakenClient = $this->getContainer()->get('cntrdr.kraken.client');
        
        $res = $krakenClient->QueryPublic('Assets');
        print_r($res);
        
        $output->writeln('Yes!');
    }
}