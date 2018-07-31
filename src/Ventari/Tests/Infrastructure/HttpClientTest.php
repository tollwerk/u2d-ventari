<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Infrastructure\HttpClient;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class HttpClientTest
 * @package Tollwerk\Ventari\Tests\Infrastructure
 */
class HttpClientTest extends AbstractTestBase
{
    /**
     * @var
     */
    public static $testClass;

    /**
     *
     */
    public static function setUpBeforeClass()
    {
        self::$testClass = new HttpClient('GET', 'localhost');
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
        $this->assertClassHasAttribute('method', get_class($httpClient));
        $this->assertClassHasAttribute('guzzle', get_class($httpClient));
    }

    /**
     * Test Dispatch Request
     *
     * @param string $request
     * @param array $params
     *
     * @dataProvider requestProvider
     */
    public function testDispatchRequest(string $request, array $params)
    {
        $this->assertEquals($request, 'Events');
        $this->assertArrayHasKey('eventId', $params);

        $httpClient = self::$testClass;
        $request    = $httpClient->dispatchRequest($request, $params);
        $this->assertInstanceOf('stdClass', $request);
    }

    /**
     * @return array
     */
    public function requestProvider()
    {
        return [
            ['Events', array('eventId' => 1080)]
        ];
    }

}
