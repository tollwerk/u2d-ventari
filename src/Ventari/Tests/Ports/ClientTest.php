<?php

namespace Tollwerk\Ventari\Tests\Ports;

use Tollwerk\Ventari\Ports\Client;
use Tollwerk\Ventari\Ports\Exception\RuntimeException;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class ClientTest extends AbstractTestBase
{
    /**
     * @var array
     */
    protected static $config;

    public static function setUpBeforeClass()
    {
        self::$config = require \dirname(__DIR__,
                4).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config-public.php';
    }

    /**
     * Test Make Request
     * @var $function string
     * @var $params   array
     *
     * @dataProvider requestProvider
     * @throws \Exception
     */
    public function testMakeRequest($function, $params): void
    {
        $request = null;
        $client  = new Client(self::$config['method'], self::$config['api'], self::$config['authentication']);


        if ($function === 'events') {
            $request = $client->getEvents($params);
        }
        if ($function === 'views/locations') {
            $request = $client->getLocations($params);
        }
        if ($function === 'views/agenda') {
            $request = $client->getSessions($params);
        }
        if ($function === 'views/speakers') {
            $request = $client->getSpeakers($params);
        }
        $this->assertInternalType('array', $request);
    }

    public function testRequestFile(): void
    {
        $request = null;
        $client  = new Client(self::$config['method'], self::$config['api'], self::$config['authentication']);
        $request = $client->getFile('hash1234');
        $this->assertInternalType('array', $request);
    }

    public function testGetSpeakerPhoto(): void
    {
        $request = null;
        $client  = new Client(self::$config['method'], self::$config['api'], self::$config['authentication']);
        $request = $client->getSpeakerPhoto('186');
        $this->assertInternalType('array', $request);
    }

    public function testRegisterForEvent(): void
    {
        $participantEmail = 'email@server.net';
        $eventId          = 1123;
        $client           = new Client(self::$config['method'], self::$config['api'], self::$config['authentication']);
        $request          = $client->registerForEvent($participantEmail, $eventId);

        $this->assertInternalType('array', $request);
    }

    public function testGetRegisteredEvents(): void
    {
        $this->expectException(RuntimeException::class);
        $client  = new Client(self::$config['method'], self::$config['api'], self::$config['authentication']);
        $request = $client->getRegisteredEvents('email@server.net ');
        $this->assertInternalType('array', $request);

        $this->expectException(RuntimeException::class);
        $client  = new Client(self::$config['method'], 'bad.server.net', self::$config['authentication']);
        $request = $client->getRegisteredEvents('email@server.net ');
        $this->assertInternalType('array', $request);
    }

//    public function testGetEventParticipants(): void
//    {
//        $client  = new Client(self::$config['method'], self::$config['api'], self::$config['authentication']);
//        $request = $client->getEventParticipants();
//        $this->assertEquals(true, true);
//        $this->assertInternalType('array', $request);
//        $request = $client->getEventParticipants(4);
//        $this->assertInternalType('array', $request);
//    }

    public function testRuntimeException(): void
    {
        $exceptionMessage = 'RuntimeException Tester';
        $exceptionCode    = 0000;
        $testClass        = new RuntimeException($exceptionMessage, $exceptionCode);
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
