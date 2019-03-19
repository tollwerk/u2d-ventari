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

    /**
     * Test Constructor
     */
    public function testConstructor(): void
    {
        self::$testClass = new CurlClient(
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
     * Test request dispatcher
     *
     * @param $function
     * @param $params
     *
     * @depends      testConstructor
     *
     * @dataProvider requestProvider
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDispatchRequest($function, $params): void
    {
        $clientResponse = self::$testClass->dispatchRequest($function, $params);
        $this->assertInstanceOf('stdClass', $clientResponse);
    }

    /**
     * Test Exception for Request
     *
     * @depends testConstructor
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
     *
     * @depends testConstructor
     */
    public function testDispatchResponseException(): void
    {
        $this->expectException(RuntimeException::class);
        self::$testClass->dispatchRequest('bad/response', []);
    }

    /**
     * Test submission dispatcher
     *
     * @depends testConstructor
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
