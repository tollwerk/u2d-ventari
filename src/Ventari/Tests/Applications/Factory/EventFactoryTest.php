<?php

namespace Tollwerk\Ventari\Tests\Applications\Factory;

use Tollwerk\Ventari\Application\Factory\EventFactory;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class EventFactoryTest extends AbstractTestBase
{
    /**
     * @var EventFactory $testClass
     */
    public static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = new EventFactory();
    }

    /**
     * Test the Instance of EventFactory
     */
    public function testConstructor()
    {
        $this->assertInstanceOf(EventFactory::class, self::$testClass);
    }

    /**
     * Test createEventFromJson
     * TODO: Assert the Object returned is Instance of Event Model
     * @dataProvider jsonInputProvider
     */
    public function testCreateEventFromJson($input)
    {
        $input = json_encode($input);
        $this->assertJson($input);
//        $actual = self::$testClass->createEventsFromJson($input);
//        $this->assertInstanceOf(Event::class, $actual);
    }

    /**
     * Test refineValue
     * @dataProvider jsonInputProvider
     */
    public function testRefineValue($input)
    {
        $input  = json_decode(json_encode($input));
        $actual = self::$testClass->accessRefineValue('eventstart', $input->Events[0]->eventstart);
        $this->assertInstanceOf(\DateTimeImmutable::class, $actual);
    }

    public function jsonInputProvider()
    {
        return [
            [
                array(
                    'Events' => array(
                        array(
                            'eventName'    => 'Test Event Name',
                            'eventstart'   => '2018-10-03',
                            'frontendLink' => 'https://www.domain.com',
                            'eventId'      => '1029'
                        )
                    )
                )
            ]
        ];
    }
}
