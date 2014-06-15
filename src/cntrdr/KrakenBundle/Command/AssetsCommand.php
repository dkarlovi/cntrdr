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
        $conn   = $this->getContainer()->get('doctrine')->getConnection();
        $stmt   = $conn->prepare('
            INSERT INTO
                assets(`name`, `alias`, `type`, `decimals`, `display`)
                VALUES(:name, :altname, :aclass, :decimals, :display_decimals)
            ON DUPLICATE KEY UPDATE
                -- collision on name PK
                `alias` = VALUES(`alias`),
                `type` = VALUES(`type`),
                `decimals` = VALUES(`decimals`),
                `display` = VALUES(`display`)
        ');
        $client = $this->getContainer()->get('cntrdr.kraken.client');
        $assets = $client->getAssets();
        foreach ($assets as $name => $data) {
            $data['name'] = $name;
            $stmt->execute($data);
        }
    }
}