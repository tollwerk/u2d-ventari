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
        $dateProps = self::$testClass->accessDateProperties();
        $this->assertInternalType('array', $dateProps);
        $input = json_decode(json_encode($input));

        foreach ($input->Events[0] as $key => $value) {
            $actual = self::$testClass->accessRefineValue($key, $value);
            if (in_array($key, $dateProps)) {
                $this->assertInstanceOf(\DateTimeImmutable::class, $actual);
            } else {
                $this->assertInternalType('string', $actual);
            }
        }

    }

    public function jsonInputProvider()
    {
        return [
            [
                array(
                    'Events' => array(
                        array(
                            'event_name'       => 'Test Event Name',
                            'event_start_date' => '2018-10-03',
                            'frontendLink'     => 'https://www.domain.com',
                            'event_id'         => '1029'
                        )
                    )
                )
            ]
        ];
    }
}
