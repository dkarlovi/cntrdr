<?php
namespace cntrdr\KrakenBundle\Tests\Client;

use cntrdr\KrakenBundle\Client\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{   
    public function testCanFetchAssets()
    {        
        $client = new Client($this->mockApiClientPublicQuery('Assets', null, array('assets')));
        
        $this->assertEquals(array('assets'), $client->getAssets());
    }
    
    public function testCanFetchBalance()
    {        
        $client = new Client($this->mockApiClientPrivateQuery('Balance', null, array('balance')));
        
        $this->assertEquals(array('balance'), $client->getBalance());
    }
    
    protected function mockApiClientPublicQuery($method, $params = null, $returnValue = null)
    {
        return $this->mockApiClient('Public', $method, $params, $returnValue);
    }
    
    protected function mockApiClientPrivateQuery($method, $params = null, $returnValue = null)
    {
        return $this->mockApiClient('Private', $method, $params, $returnValue);
    }
    
    protected function mockApiClient($type, $method, $params = null, $returnValue = null)
    {
        $callable  = sprintf('Query%s', ucfirst(strtolower($type)));
        $apiClient = $this->getMock('KrakenAPI', array($callable), array('key', 'secret'));
        $mocker    = $apiClient
                        ->expects($this->once())
                        ->method($callable);
        if (null === $params) {
            $mocker
                ->with($this->equalTo($method));
        } else {
            $mocker
                ->with($this->equalTo($method), $this->equalTo($params));
        }
        
        if (null !== $returnValue) {
            $mocker
                ->will($this->returnValue($returnValue));
        }
        
        return $apiClient;
    }
}