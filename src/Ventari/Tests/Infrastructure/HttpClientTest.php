<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Infrastructure\HttpClient;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class HttpClientTest extends AbstractTestBase
{

    public function test__construct()
    {
        $HttpClient = new HttpClient();
        /**
         * Testing the Constructor
         */
        $this->assertClassHasAttribute('guzzle', get_class($HttpClient));

        /**
         * Testing Class name as String and not as Instance
         */
        $expectedClass = $HttpClient->getGuzzle();
        $this->assertEquals(get_class($expectedClass), \GuzzleHttp\Client::class);
    }

}
