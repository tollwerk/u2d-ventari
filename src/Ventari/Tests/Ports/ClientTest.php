<?php

namespace Tollwerk\Ventari\Tests\Ports;

use Tollwerk\Ventari\Domain\Model\Event;
use Tollwerk\Ventari\Ports\Client;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class ClientTest extends AbstractTestBase
{
    /**
     * Test Constructor
     */
    public function testConstructor()
    {
        $this->assertClassHasAttribute('restConfig', Client::class);
    }

    /**
     * Test Make Request
     * @var $function string
     * @var $params   array
     *
     * @dataProvider requestProvider
     */
    public function testMakeRequest($function, $params)
    {
        $client  = new Client();
        $request = $client->makeRequest($function, $params);
        $this->assertInternalType('array', $request);
        foreach ($request as $item) {
            $this->assertInstanceOf(Event::class, $item);
        }
    }

    public function requestProvider()
    {
        return [
            [
                'Events',
                array(
                    'eventId' => 1080
                )
            ]
        ];
    }
}
