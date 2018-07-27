<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Infrastructure\HttpClient;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class HttpClientTest extends AbstractTestBase
{
    public static $HttpClient;

    public static function setUpBeforeClass()
    {
        self::$HttpClient = new HttpClient();
    }

    public function test__construct()
    {
        /**
         * Testing Class name as String and not as Instance
         */
        $expectedClass = self::$HttpClient->getGuzzle();
        $this->assertEquals(get_class($expectedClass), \GuzzleHttp\Client::class);
    }

}
