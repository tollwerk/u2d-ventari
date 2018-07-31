<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Infrastructure\HttpClient;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class HttpClientTest extends AbstractTestBase
{
    public static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = new HttpClient();
    }

    /**
     * Test Constructor
     */
    public function testConstructor()
    {
        $httpClient = self::$testClass;
        /**
         * Testing the Constructor
         */
        $this->assertClassHasAttribute('guzzle', get_class($httpClient));
    }

    /**
     * Test Dispatch Request
     * @dataProvider requestProvider
     */
    public function testDispatchRequest($method, $domain)
    {
        $this->assertEquals($method, 'GET');
        $this->assertNotEmpty($domain);

        $httpClient = self::$testClass;
        $request = $httpClient->dispatchRequest($method, $domain);
        $this->assertInstanceOf('stdClass', $request);
    }

    public function requestProvider()
    {
        return [
            ['GET', 'events.nueww.de']
        ];
    }

}
