<?php
namespace cntrdr\KrakenBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use cntrdr\KrakenBundle\Entity\Balance;

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
        $em           = $this->getContainer()->get('doctrine')->getManager();
        $krakenClient = $this->getContainer()->get('cntrdr.kraken.client');
        foreach ($krakenClient->getBalance() as $asset => $amount) {
            $balance = new Balance;
            $balance
                ->setAsset($asset)
                ->setAmount($amount);
            
            $em->persist($balance);
        }
        $em->flush();
    }
}