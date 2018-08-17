<?php

namespace Tollwerk\Ventari\Tests\Ports;

use Tollwerk\Ventari\Ports\Client;
use Tollwerk\Ventari\Ports\Exception\RuntimeException;
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
        $request = null;
        $config  = require \dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config-public.php';
        $client  = new Client($config['method'], $config['api'], $config['authentication']);

        if ($function == 'events') {
            $request = $client->getEvents($params);
        }
        if ($function == 'views/locations') {
            $request = $client->getLocations($params);
        }
        if ($function == 'views/agenda') {
            $request = $client->getSessions($params);
        }
        if ($function == 'views/speakers') {
            $request = $client->getSpeakers($params);
        }
        $this->assertInternalType('array', $request);
    }

    /**
     * Test Request File
     */
    public function testRequestFile(): void
    {
        $request = null;
        $config  = require \dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config-public.php';
        $client  = new Client($config['method'], $config['api'], $config['authentication']);
        $request = $client->getFile('hash1234');
        $this->assertInternalType('array', $request);
    }

    public function testGetSpeakerPhoto(): void
    {
        $request = null;
        $config  = require \dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config-public.php';
        $client  = new Client($config['method'], $config['api'], $config['authentication']);
        $request = $client->getSpeakerPhoto('186');
        $this->assertInternalType('array', $request);

    }

    public function testRuntimException(): void
    {
        $exceptionMessage = 'RuntimeException Tester';
        $exceptionCode    = 0000;
        $testClass        = new RuntimeException($exceptionMessage, $exceptionCode);

        echo '---';
        echo $testClass->getMessage();
        echo '---';

        $this->assertEquals($exceptionMessage, $testClass->getMessage());
    }

    public function requestProvider(): array
    {
        return [
            ['events', ['eventId' => 1080]],
            ['views/locations', ['hotelId' => 2191]],
            ['views/agenda', ['session_id' => 3302]],
            ['views/speakers', ['id' => 186]]
        ];
    }
}
