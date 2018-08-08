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
        $config = require dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'config/config.php';
        self::$testClass = new HttpClient($config['method'], $config['api'], $config['authentication']);
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
     * @param string $request
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDispatchRequest(string $request, array $params): void
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
    public function requestProvider(): array
    {
        return [
            ['events', ['eventId' => 1080, 'eventName' => 'Event Name']]
        ];
    }
}
