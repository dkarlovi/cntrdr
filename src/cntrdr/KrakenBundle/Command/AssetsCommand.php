<?php
namespace cntrdr\KrakenBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use cntrdr\KrakenBundle\Entity\Asset;

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
        $em     = $this->getContainer()->get('doctrine')->getManager();
        $client = $this->getContainer()->get('cntrdr.kraken.client');
        $assets = $client->getAssets();
        foreach ($assets as $name => $data) {
            $asset = new Asset;
            $asset
                ->setName($name)
                ->setAlias($data['altname'])
                ->setType($data['aclass'])
                ->setDecimals($data['decimals'])
                ->setDisplay($data['display_decimals']);
            
            $em->persist($asset);
        }
        $em->flush();
    }
}