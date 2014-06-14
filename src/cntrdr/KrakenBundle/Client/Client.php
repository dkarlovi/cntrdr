<?php
namespace cntrdr\KrakenBundle\Client;

class Client
{
    protected $krakenClient;

    public function __construct(\KrakenAPI $krakenClient)
    {
        $this->krakenClient = $krakenClient;
    }
    
    public function getAssets()
    {
        return $this->krakenClient->QueryPublic('Assets');
    }
}