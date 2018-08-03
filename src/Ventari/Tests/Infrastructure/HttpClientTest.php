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
     * @var HttpClient $testClass
     */
    public static $testClass;

    /**
     *
     */
    public static function setUpBeforeClass()
    {
        self::$testClass = new HttpClient('GET', 'https://events.nueww.de/rest/');
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
        $this->assertEquals($request, 'events');
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
            ['events', ['eventId' => 1080, 'eventName' => 'Event Name']]
        ];
    }
}
