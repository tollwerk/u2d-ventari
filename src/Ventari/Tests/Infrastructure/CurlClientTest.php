<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Infrastructure\CurlClient;
use Tollwerk\Ventari\Infrastructure\Exception\RuntimeException;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class CurlClientTest
 * @package Tollwerk\Ventari\Tests\Infrastructure
 */
class CurlClientTest extends AbstractTestBase
{
    /**
     * @var CurlClient $testClass
     */
    public static $testClass;

    public static function setUpBeforeClass()
    {
        /**
         * Local Config File
         */
        $config = require \dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config-public.php';

        self::$testClass = new CurlClient($config['method'], $config['api'], $config['authentication']);
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
        $this->assertClassHasAttribute('guzzle', \get_class($httpClient));
        $this->assertClassHasAttribute('method', \get_class($httpClient));
        $this->assertClassHasAttribute('baseUrl', \get_class($httpClient));
        $this->assertClassHasAttribute('authentication', \get_class($httpClient));
    }

    /**
     * @param $function
     * @param $params
     *
     * @dataProvider requestProvider
     */
    public function testDispatchRequest($function, $params): void
    {
        $clientResponse = self::$testClass->dispatchRequest($function, $params);
        $this->assertInstanceOf('stdClass', $clientResponse);
    }

    /**
     * Test Exception for Request
     */
    public function testDispatchRequestException(): void
    {
        $testClass = new CurlClient('GET', 'wrong.server.net', [
            'username' => 'username',
            'password' => 'qwerasdfzxcvtyuighjkbnmop'
        ]);
        $this->expectException(RuntimeException::class);
        $testClass->dispatchRequest('fake_event', []);
    }

    /**
     * Test Exception for Response
     */
    public function testDispatchResponseException(): void
    {
        $this->expectException(RuntimeException::class);
        self::$testClass->dispatchRequest('bad/response', []);
    }

    /**
     *
     */
    public function testDispatchSubmission(): void
    {
        $clientResponse = self::$testClass->dispatchSubmission('participants', [
            'eventId' => 1123,
            'fields'  => [
                'pa_email' => 'email@server.net',
            ]
        ]);
        $this->assertInstanceOf('stdClass', $clientResponse);
    }

    /**
     * @return array
     */
    public function requestProvider(): array
    {
        return [
            [
                'participants',
                [
                    'filterActiveEvents' => 1,
                    'filterFields'       => [
                        'pa_email' => 'email@server.net',
                    ],
                ]
            ]
        ];
    }
}
