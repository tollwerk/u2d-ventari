<?php

namespace Tollwerk\Ventari\Tests\Applications\Factory;

use Tollwerk\Ventari\Application\Factory\EventFactory;
use Tollwerk\Ventari\Domain\Model\Event;
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
     * Test createFromJson
     *
     * @param $input
     *
     * @dataProvider jsonInputProvider
     * @throws \Exception
     */
    public function testCreateFromJson($input): void
    {
        $actual = self::$testClass->createFromJson($input);
        $this->assertInstanceOf(Event::class, $actual);
    }

    /**
     * Test refineValue
     *
     * @param $input
     *
     * @dataProvider jsonInputProvider
     */
    public function testRefineValue($input): void
    {
        $dateProps = self::$testClass->accessDateProperties();
        $this->assertInternalType('array', $dateProps);
        $input = json_decode(json_encode($input));

        foreach ($input as $key => $value) {
            $actual = self::$testClass->accessRefineValue($key, $value);
            if (in_array($key, $dateProps)) {
//                $this->assertInstanceOf(\DateTime::class, $actual);
                $this->assertInternalType('array', $actual);
            } else {
                $this->assertInternalType('string', $actual);
            }
        }

    }

    public function jsonInputProvider(): array
    {
        return [
            [
                array(
                    'event_name'       => 'Test Event Name',
                    'event_start_date' => '2018-10-03',
                    'frontendLink'     => 'https://www.domain.com',
                    'event_id'         => '1029'
                )
            ]
        ];
    }
}
