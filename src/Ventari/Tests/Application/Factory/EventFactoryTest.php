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

    /**
     * Test the Instance of EventFactory
     */
    public function testConstructor(): void
    {
        self::$testClass = new EventFactory();
        $this->assertInstanceOf(EventFactory::class, self::$testClass);
    }

    /**
     * Test createFromJson
     *
     * @param $input
     *
     * @depends testConstructor
     *
     * @dataProvider getCreateFromJsonData
     * @throws \Exception
     */
    public function testCreateFromJson($input): void
    {
        $actual = self::$testClass::createFromJson([$input]);
        $this->assertInstanceOf(Event::class, $actual);
    }

    public function getCreateFromJsonData(): array
    {
        return [
            [
                'event_name'       => 'Test Event Name',
                'event_start_date' => '2018-10-03',
                'frontendLink'     => 'https://www.domain.com',
                'event_id'         => '1029'
            ]
        ];
    }
}
