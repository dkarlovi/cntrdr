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
        return $this->unwrap($this->krakenClient->QueryPublic('Assets'));
    }
    
    public function getBalance()
    {
        return $this->unwrap($this->krakenClient->QueryPrivate('Balance'));
    }
    
    protected function unwrap(array $response)
    {
        return $response['result'];
    }
}
