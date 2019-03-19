<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Infrastructure\Exception\RuntimeException;
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
     * Test Constructor
     */
    public function testConstructor(): void
    {
        self::$testClass = new HttpClient(
            getenv('VENTARI_API_METHOD'),
            getenv('VENTARI_API_URL'),
            [
                'username' => getenv('VENTARI_API_USERNAME'),
                'password' => getenv('VENTARI_API_PASSWORD')
            ]
        );

        /**
         * Testing the Constructor
         */
        $this->assertClassHasAttribute('guzzle', \get_class(self::$testClass));
        $this->assertClassHasAttribute('method', \get_class(self::$testClass));
        $this->assertClassHasAttribute('baseUrl', \get_class(self::$testClass));
        $this->assertClassHasAttribute('authentication', \get_class(self::$testClass));
    }

    /**
     * @param $function
     * @param $params
     *
     * @depends testConstructor
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
        $testClass = new HttpClient('GET', 'wrong.server.net', [
            'username' => 'username',
            'password' => 'qwerasdfzxcvtyuighjkbnmop'
        ]);
        $this->expectException(RuntimeException::class);
        $testClass->dispatchRequest('fake_event', []);
    }

    /**
     * Test Exception for Response
     *
     * @depends testConstructor
     */
    public function testDispatchResponseException(): void
    {
        $this->expectException(RuntimeException::class);
        self::$testClass->dispatchRequest('bad/request', []);
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
