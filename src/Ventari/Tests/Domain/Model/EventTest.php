<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\Event;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class EventTest extends AbstractTestBase
{
    /**
     * Test Event
     *
     * @param $property
     * @param $value
     *
     * @throws \Exception
     * @dataProvider getEventData
     */
    public function testEvent($property, $value): void
    {
        $event = new Event();

        $setter = 'set'.ucfirst($property);
        $getter = ($property !== 'hidden' && $property !== 'chargeable') ? 'get'.ucfirst($property) : 'is'.ucfirst($property);

        $event->$setter($value);
        $this->assertEquals($value, $event->$getter());
    }

    /**
     * Test ticket price regex match
     *
     * @throws \Exception
     */
    public function testSetTicketPrice(): void
    {
        $event = new Event();
        // Test ticket price setter & getter
        $event->setTicketPrice('asdf');
        $this->assertEquals(0, $event->getTicketPrice());
    }

    /**
     * Test event date trait
     *
     * @throws \Exception
     */
    public function testEventDateTrait(): void
    {
        $event     = new Event();
        $dateTime  = new \DateTime('@0');
        $timestamp = [
            'year'   => $dateTime->format('Y'),
            'month'  => $dateTime->format('n'),
            'day'    => $dateTime->format('j'),
            'hour'   => $dateTime->format('G'),
            'minute' => $dateTime->format('i')
        ];
        // Test start date time setter & getter
        $event->setStartDateTime($timestamp);
        $this->assertEquals($dateTime, $event->getStartDateTime());
        // Test end date time setter & getter
        $event->setEndDateTime($timestamp);
        $this->assertEquals($dateTime, $event->getEndDateTime());
    }

    public function getEventData(): array
    {
        return [
            /* Event contact trait */
            ['organizerEmail', ''],
            ['organizerFacebook', ''],
            ['organizerInstagram', ''],
            ['organizerOtherLink', ''],
            ['organizerWebsite', ''],
            ['organizerLogo', ''],
            ['organizerName', ''],
            ['organizerTwitter', ''],

            /* Event date trait */
            // ['startDateTime', $timestamp],
            // ['endDateTime', $timestamp],

            /* Event link trait */
            ['facebookEvent', ''],
            ['twitter', ''],
            ['xingEvent', ''],
            ['livestreamEmbed', ''],
            ['livestream', ''],
            ['ticketUrl', ''],
            ['website', ''],

            /* Model specific properties */
            ['ventariCategories', []],
            ['chargeable', true],
            ['locality', ''],
            ['ticketDescription', ''],
            ['ticketPrice', '1.23'],
            ['description', ''],
            ['summary', ''],
            ['image', ''],
            ['level', []],
            ['maxParticipants', 0],
            ['name', ''],
            ['tags', ''],
            ['presentationLanguage', []],
            ['status', 0],
            ['targetGroup', []],
            ['tracks', []],
            ['registration', '']
        ];
    }
}
