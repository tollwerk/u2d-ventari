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
    public $testClass;

    public function testClass()
    {
        $this->assertTrue(true);
        $testClass = new VentariAPI();

        return $testClass;
    }

    /**
     * Test GetEventIds
     * @depends      testClass
     * @dataProvider eventIdsProvider
     */
    public function testGetEventIds($events, $testClass)
    {
        $actualString   = $testClass->getEventIds($events);
        $expectedString = '?eventIds=1800,1845,1860';
        $this->assertEquals($expectedString, $actualString);
    }

    public function eventIdsProvider()
    {
        return [
            [array('1800', '1845', '1860')],
//            [array('1999', '2017', '1306')] // for the fail
        ];
    }

    /**
     * Test GetStatusIds
     * @depends      testClass
     * @dataProvider statusIdsProvider
     */
    public function testGetStatusIds($statusIds, $testClass)
    {
        $actualString   = $testClass->getStatusIds($statusIds);
        $expectedString = '?statusIds=1,2,6';
        $this->assertEquals($expectedString, $actualString);
    }

    public function statusIdsProvider()
    {
        return [
            [array('1', '2', '6')],
//            [array('1', '2', '3', '5', '8', '13', '21', '34')] // for the fail
        ];
    }

    /**
     * Test GetFilterStartDate
     * @depends      testClass
     * @dataProvider datesProvider
     */
    public function testGetFilterStartDate($dates, $testClass)
    {
        $actualString   = $testClass->getFilterStartDate($dates);
        $expectedString = '?filterStarDate=01.12.2018';
        $this->assertEquals($expectedString, $actualString);
    }

    /**
     * Test GetFilterEndDate
     * @depends      testClass
     * @dataProvider datesProvider
     */
    public function testGetFilterEndDate($dates, $testClass)
    {
        $actualString   = $testClass->getFilterEndDate($dates);
        $expectedString = '?filterEndDate=31.12.2018';
        $this->assertEquals($expectedString, $actualString);
    }

    public function datesProvider()
    {
        return [
            ['01.12.2018'],
            ['31.12.2018']
        ];
    }

    /**
     * Test GetPersonIds
     * @depends      testClass
     * @dataProvider personIdsProvider
     */
    public function testGetPersonIds($personIds, $testClass)
    {
        $actualString   = $testClass->getPersonIds($personIds);
        $expectedString = '?personIds=1,31';
        $this->assertEquals($expectedString, $actualString);
    }

    public function personIdsProvider()
    {
        return [
            [array('1', '31')],
//            [array('31', '1')] // for the fail
        ];
    }

    /**
     * Test GetPage
     * @depends      testClass
     * @dataProvider pageIdsProvider
     */
    public function testGetPage($pageIds, $testClass)
    {
        $actualString   = $testClass->getPage($pageIds);
        $expectedString = '?page=1';
        $this->assertEquals($expectedString, $actualString);
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
