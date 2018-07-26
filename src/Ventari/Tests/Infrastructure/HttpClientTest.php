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
        $this->assertInstanceOf(HttpClient::class, self::$HttpClient);
        $this->assertInstanceOf(self::$HttpClient->guzzle, \GuzzleHttp\Client::class);
    }

}
