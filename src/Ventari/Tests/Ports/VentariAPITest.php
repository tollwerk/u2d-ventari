<?php

namespace Tollwerk\Ventari\Tests\Ports;

use Tollwerk\Ventari\Ports\VentariAPI;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * VentariAPI test
 *
 * @package Tollwerk\Ventari\Tests\Ports
 */
class VentariAPITest extends AbstractTestBase
{
    public static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = new VentariAPI();
    }

    /**
     * Test GetEventIds
     * @dataProvider integerIdsProvider
     */
    public function testGetEventIds($events)
    {
        $actualString = self::$testClass->getEventByIds($events);
        $expectedString = '?eventIds=1,2,3,5,8,13';
        $this->assertEquals($expectedString, $actualString);
    }

    /**
     * Test GetStatusIds
     * @dataProvider integerIdsProvider
     */
    public function testGetStatusIds($statusIds)
    {
        $actualString = self::$testClass->getEventsByStatusIds($statusIds);
        $expectedString = '?statusIds=1,2,3,5,8,13';
        $this->assertEquals($expectedString, $actualString);
    }

    /**
     * Test GetFilterStartDate
     * @dataProvider datesProvider
     */
    public function testGetFilterStartDate($dates)
    {
        $actualString = self::$testClass->getEventsByFilterStartDate($dates);
        $expectedString = '?filterStarDate=01.12.2018';
        $this->assertEquals($expectedString, $actualString);
    }

    /**
     * Test GetFilterEndDate
     * @dataProvider datesProvider
     */
    public function testGetFilterEndDate($dates)
    {
        $actualString = self::$testClass->getEventsByFilterEndDate($dates);
        $expectedString = '?filterEndDate=01.12.2018';
        $this->assertEquals($expectedString, $actualString);
    }

    /**
     * Test GetPersonIds
     * @dataProvider integerIdsProvider
     */
    public function testGetPersonIds($personIds)
    {
        $actualString = self::$testClass->getEventsByPersonIds($personIds);
        $expectedString = '?personIds=1,2,3,5,8,13';
        $this->assertEquals($expectedString, $actualString);
    }

    /**
     * Test GetPage
     * @dataProvider pageIdsProvider
     */
    public function testGetPage($pageIds)
    {
        $actualString = self::$testClass->getEventsByPage($pageIds);
        $expectedString = '?page=1';
        $this->assertEquals($expectedString, $actualString);
    }

    public function integerIdsProvider()
    {
        return [
            [array('1', '2', '3', '5', '8', '13')]
        ];
    }
    public function datesProvider()
    {
        return [
            ['01.12.2018'],
        ];
    }
    public function pageIdsProvider()
    {
        return [
            ['1'],
//            ['2'],    // for the fail
//            ['3'],    // for the fail
//            ['5'],    // for the fail
//            ['8'],    // for the fail
//            ['13'],   // for the fail
        ];
    }

}

