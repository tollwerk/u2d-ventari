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
    /**
     * Test GetEventIds
     * @dataProvider eventIdsProvider
     */
    public function testGetEventIds($events)
    {
        $testClass = new VentariAPI();
        $actualString = $testClass->getEventIds($events);
        $expectedString = '?eventIds=1800,1845,1860';

        $this->assertEquals($expectedString,$actualString);
    }

    public function eventIdsProvider()
    {
        return [
            [array('1800','1845','1860')],
//            [array('1800','1860','1845')],
//            [array('1999','2017','1306')]
        ];
    }


//    public function testGetPage()
//    {
//
//    }
//
//    public function testGetFilterEndDate()
//    {
//
//    }
//
//    public function testGetPersonIds()
//    {
//
//    }
//
//    public function testGetStatusIds()
//    {
//
//    }
//
//    public function testGetFilterStartDate()
//    {
//
//    }
}
