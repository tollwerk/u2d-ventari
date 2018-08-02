<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\Event;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class EventTest extends AbstractTestBase
{
    /**
     * @var Event $event
     */
    public static $event;

    public static function setUpBeforeClass()
    {
        self::$event = new Event();
    }

    public function event()
    {
        $this->assertInstanceOf(Event::class, self::$event);

        return self::$event;
    }

    /**
     * Test Get and Set Event Id
     */
    public function testEventId()
    {
        $event = $this->event();
        $event->setId(1234);
        $expectedString = $event->getId();
        $actualString   = '1234';
        $this->assertEquals($expectedString, intval($actualString));

        return $event;
    }

    /**
     * Test Get and Set Event Id
     * @depends testEventId
     */
    public function testEventName($event)
    {
        $eventName = 'Event Name';
        $event->setEventName($eventName);
        $expectedString = $event->getEventName();
        $actualString   = $eventName;
        $this->assertEquals($expectedString, $actualString);

        return $event;
    }

    /**
     * Test Get and Set Event Date
     * @depends testEventName
     */
    public function testEventDate($event)
    {
        $eventDate = new \DateTimeImmutable('2018-12-10');
        $event->setEventStartDate($eventDate);
        $expectedString = $event->getEventStartDate();
        $actualString   = $eventDate;
        $this->assertEquals($expectedString, $actualString);

        return $event;
    }

    /**
     * Test Get and Set Event Link
     * @depends testEventDate
     */
    public function testEventLink($event)
    {
        $eventLink = 'https://www.nueww.de/event/link.php?id=1234';
        $event->setEventFrontendLink($eventLink);
        $expectedString = $event->getEventFrontendLink();
        $actualString   = $eventLink;
        $this->assertEquals($expectedString, $actualString);
    }

//    public function abstractMethod(): void
//    {
//
//    }
}
