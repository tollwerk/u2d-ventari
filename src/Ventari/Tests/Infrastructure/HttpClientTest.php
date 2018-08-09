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
        $config = require \dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config-public.php';
        self::$testClass = new HttpClient($config['method'], $config['api'], $config['authentication']);
    }

    /**
     * Test Constructor
     */
    public function testConstructor(): void
    {
        $httpClient = self::$testClass;
        /**
         * Testing the Constructor
         */
        $this->assertClassHasAttribute('guzzle', get_class($httpClient));
        $this->assertClassHasAttribute('method', get_class($httpClient));
        $this->assertClassHasAttribute('baseUrl', get_class($httpClient));
        $this->assertClassHasAttribute('authentication', get_class($httpClient));
    }

    /**
     * @param $function
     * @param $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @dataProvider requestProvider
     */
    public function testDispatchRequest($function, $params): void
    {
        $httpClient     = self::$testClass;
        $clientResponse = $httpClient->dispatchRequest($function, $params);
        $this->assertInstanceOf('stdClass', $clientResponse);
    }

    /**
     * @return array
     */
    public function requestProvider(): array
    {
        return [
            ['events', []],
            ['views/locations', []],
            ['views/agenda', []]
        ];
    }
}
