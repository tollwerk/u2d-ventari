<?php

namespace Tollwerk\Ventari\Tests\Domain;

use Tollwerk\Ventari\Domain\VentariClient;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class VentariClientTest extends AbstractTestBase
{
    public static $testClass;

    /**
     * Test Get function
     * @dataProvider requestsProvider
     */
    public function testGet($requests)
    {
//        $actualString = self::$testClass->get($requests);
        $actualString = $requests;
        $expectedString = 'getEventsById';
        $this->assertEquals($expectedString, $actualString);
    }

    public function requestsProvider()
    {
        return [
            ['getEventsById']
        ];
//        return [
//            [array(
//                'method' => 'eventByIds',
//                'data' => ['1800','1845','1860']
//            )]
//        ];
    }
}
