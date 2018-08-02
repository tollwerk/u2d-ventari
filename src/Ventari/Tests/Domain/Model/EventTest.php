<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\Event;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class EventTest extends AbstractTestBase
{
    /**
     * @var Event $testClass
     */
    public $testClass;

    protected function setUp()
    {
        $this->testClass = new Event();
    }

    public function testClass(): void
    {
        $this->assertInstanceOf(Event::class, $this->testClass);
    }

    public function testEventCategory(): void
    {
        $expectedString = 'Introduction';
        $event          = $this->testClass;
        $event->setEventCategory($expectedString);
        $this->assertEquals($expectedString, $event->getEventCategory());
    }

    public function testEventChargeable(): void
    {
        $event = $this->testClass;

        $expectedValue = true;
        $event->setEventChargeable($expectedValue);
        $this->assertEquals($expectedValue, $event->getEventChargeable());

        $expectedValue = false;
        $event->setEventChargeable($expectedValue);
        $this->assertFalse($event->getEventChargeable());
    }

    public function testEventCity(): void
    {
        $expectedString = 'Nürnberg';
        $event          = $this->testClass;
        $event->setEventCity($expectedString);
        $this->assertEquals($expectedString, $event->getEventCity());
    }

    public function testEventCostDescription(): void
    {
        $expectedString = 'Free with School ID';
        $event          = $this->testClass;
        $event->setEventCostDescription($expectedString);
        $this->assertEquals($expectedString, $event->getEventCostDescription());
    }

    public function testEventCost(): void
    {
        $event = $this->testClass;

        $expectedString = 'Free';
        $event->setEventCost($expectedString);
        $this->assertEquals($expectedString, $event->getEventCost());

        $expectedString = '€20.00';
        $event->setEventCost($expectedString);
        $this->assertEquals($expectedString, $event->getEventCost());
    }

    public function testEventDescriptionLong(): void
    {
        $expectedString = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
        $event          = $this->testClass;
        $event->setEventDescriptionLong($expectedString);
        $this->assertEquals($expectedString, $event->getEventDescriptionLong());
    }

    public function testEventDescription(): void
    {
        $expectedString = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
        $event          = $this->testClass;
        $event->setEventDescription($expectedString);
        $this->assertEquals($expectedString, $event->getEventDescription());
    }

    public function testEventImage(): void
    {
        $expectedString = '/file_upload/media/events/138532110.svg';
        $event          = $this->testClass;
        $event->setEventImage($expectedString);
        $this->assertEquals($expectedString, $event->getEventImage());
    }

    public function testEventLevel(): void
    {
        $expectedString = 'Expert';
        $event          = $this->testClass;
        $event->setEventLevel($expectedString);
        $this->assertEquals($expectedString, $event->getEventLevel());
    }

    public function testEventMaxParticipants(): void
    {
        $expectedValue = 48;
        $event         = $this->testClass;
        $event->setEventMaxParticipants($expectedValue);
        $this->assertEquals($expectedValue, $event->getEventMaxParticipants());
    }

    public function testEventName(): void
    {
        $expectedString = 'Web Accessibility Review';
        $event          = $this->testClass;
        $event->setEventName($expectedString);
        $this->assertEquals($expectedString, $event->getEventName());
    }

    public function testEventOtherTags(): void
    {
        $expectedString = 'web, javascript, e-commerce';
        $event          = $this->testClass;
        $event->setEventOtherTags($expectedString);
        $this->assertEquals($expectedString, $event->getEventOtherTags());
    }

    public function testEventPresentationLanguage(): void
    {
        $expectedString = 'Deutsch';
        $event          = $this->testClass;
        $event->setEventPresentationLanguage($expectedString);
        $this->assertEquals($expectedString, $event->getEventPresentationLanguage());
    }

    public function testEventStatus(): void
    {
        $expectedString = 'Cancelled';
        $event          = $this->testClass;
        $event->setEventStatus($expectedString);
        $this->assertEquals($expectedString, $event->getEventStatus());
    }

    public function testEventTargetGroup(): void
    {
        $expectedString = 'youth';
        $event          = $this->testClass;
        $event->setEventTargetGroup($expectedString);
        $this->assertEquals($expectedString, $event->getEventTargetGroup());
    }

    public function testEventTracks(): void
    {
        $expectedString = 'I dunno what this property means';
        $event = $this->testClass;
        $event->setEventTracks($expectedString);
        $this->assertEquals($expectedString, $event->getEventTracks());
    }

    public function testEventTyp(): void
    {
        $expectedString = 'Sponsored';
        $event = $this->testClass;
        $event->setEventTyp($expectedString);
        $this->assertEquals($expectedString, $event->getEventTyp());
    }

    public function testEventFrontendLink(): void
    {
        $expectedString = 'https://events.nueww.de/tms/frontend/frontend.cfm?l=1000';
        $event = $this->testClass;
        $event->setEventFrontendLink($expectedString);
        $this->assertEquals($expectedString, $event->getEventFrontendLink());
    }
}
