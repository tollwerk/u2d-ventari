<?php

namespace Tollwerk\Ventari\Tests\Ports;

use Tollwerk\Ventari\Ports\Client;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class ClientTest extends AbstractTestBase
{
    /**
     * Test Make Request
     * @var $function string
     * @var $params   array
     *
     * @dataProvider requestProvider
     */
    public function testMakeRequest($function, $params): void
    {
        $config = ['method' => 'GET', 'api' => 'https://events.nueww.de/rest/', 'authentication' => ['username' => 'username', 'password' => 'password']];
        $client = new Client($config['method'], $config['api'], $config['authentication']);

        if ($function == 'events') {
            $request = $client->getEvents($params);
        }
        if ($function == 'views/locations') {
            $request = $client->getEvents($params);
        }
        if ($function == 'views/agenda') {
            $request = $client->getEvents($params);
        }
        $this->assertInternalType('array', $request);
    }

    public function requestProvider(): array
    {
        return [
            [
                'events',
                array(
                    'eventId' => 1080
                )
            ],
            [
                'views/locations',
                array(
                    'hotelId' => 2191
                )
            ],
            [
                'views/agenda',
                array(
                    'session_id' => 3302
                )
            ]
        ];
    }
}
