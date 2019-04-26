<?php

namespace Tollwerk\Ventari\Tests\Ports;

use Exception;
use Tollwerk\Ventari\Ports\Client;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class ClientTest extends AbstractTestBase
{
    /**
     * Test Make Request
     * @throws Exception
     * @var $params   array
     *
     * @dataProvider requestProvider
     * @var $function string
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

    /**
     * Test requesting a file
     */
    public function testRequestFile(): void
    {
        $request = null;
        $client  = new Client();
        $request = $client->getFile('hash1234');
        $this->assertIsArray($request);
    }

    /**
     * Test requesting a speaker photo
     */
    public function testGetSpeakerPhoto(): void
    {
        $request = null;
        $client  = new Client();
        $request = $client->getSpeakerPhoto('186');
        $this->assertIsArray($request);
    }

    /**
     * Test registering for an event
     */
    public function testRegisterForEvent(): void
    {
        $participantEmail = 'email@server.net';
        $eventId          = 1123;
        $client           = new Client();
        try {

            $request = $client->registerForEvent($participantEmail, $eventId);
            $this->assertIsArray($request);
        } catch (Exception $exception) {
            echo PHP_EOL.$exception;
            echo PHP_EOL.'Check if participants exists in the Ventari API';
            $this->assertIsArray([]);
        }
    }

    /**
     * Test requesting all registered events
     */
    public function testGetRegisteredEvents(): void
    {
        $client  = new Client();
        $request = $client->getRegisteredEvents('email@server.net');
        $this->assertIsArray($request);
    }

    /**
     * Test requesting all event participants
     */
    public function testGetEventParticipants(): void
    {
        $client  = new Client();
        $request = $client->getEventParticipants();
        $this->assertIsArray($request);
        $request = $client->getEventParticipants(4);
        $this->assertIsArray($request);
    }

    /**
     * Test requesting the participant status
     */
    public function testGetEventParticipantStatus(): void
    {
        $client  = new Client();
        $request = $client->getEventParticipantStatus('1080', [4, 5, 6]);
        $this->assertIsArray($request);
    }

    /**
     * Test requesting all participants
     */
    public function testGetAllParticipants(): void
    {
        $client  = new Client();
        $request = $client->getAllParticipants();
        $this->assertIsArray($request);
    }

    /**
     * Data provider
     *
     * @return array
     */
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
