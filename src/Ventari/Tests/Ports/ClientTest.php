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
     * @throws \Exception
     */
    public function testMakeRequest($function, $params): void
    {
        $request = null;
        $client  = new Client();


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
        $this->assertIsArray($request);
    }

    public function testRequestFile(): void
    {
        $request = null;
        $client  = new Client();
        $request = $client->getFile('hash1234');
        $this->assertIsArray($request);
    }

    public function testGetSpeakerPhoto(): void
    {
        $request = null;
        $client  = new Client();
        $request = $client->getSpeakerPhoto('186');
        $this->assertIsArray($request);
    }

    public function testRegisterForEvent(): void
    {
        $participantEmail = 'email@server.net';
        $eventId          = 1123;
        $client           = new Client();
        $request          = $client->registerForEvent($participantEmail, $eventId);

        $this->assertIsArray($request);
    }

    public function testGetRegisteredEvents(): void
    {
        $client  = new Client();
        $request = $client->getRegisteredEvents('email@server.net ');
        $this->assertIsArray($request);
    }

    public function testGetEventParticipants(): void
    {
        $client  = new Client();
        $request = $client->getEventParticipants();
        $this->assertIsArray($request);
        $request = $client->getEventParticipants(4);
        $this->assertIsArray($request);
    }

    public function testRuntimeException(): void
    {
        $exceptionMessage = 'RuntimeException Tester';
        $exceptionCode    = 0000;
        $testClass        = new RuntimeException($exceptionMessage, $exceptionCode);
        $this->assertEquals($exceptionMessage, $testClass->getMessage());
    }

    public function testGetEventParticipantStatus(): void
    {
        $client = new Client();
        $request = $client->getEventParticipantStatus('1080', [4,5,6]);
        $this->assertIsArray($request);
    }

    public function testGetAllParticipants(): void
    {
        $client = new Client();
        $request = $client->getAllParticipants();
        $this->assertIsArray($request);
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
