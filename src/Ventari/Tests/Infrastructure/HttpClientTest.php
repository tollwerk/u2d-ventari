<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Infrastructure\HttpClient;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class HttpClientTest extends AbstractTestBase
{

    public function testConstructor()
    {
        $httpClient = new HttpClient();
        /**
         * Testing the Constructor
         */
        $this->assertClassHasAttribute('guzzle', get_class($httpClient));
    }
}
