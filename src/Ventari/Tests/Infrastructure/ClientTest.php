<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Infrastructure\Client;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class ClientTest extends AbstractTestBase
{
    /**
     * @var Client $testClass
     */
    protected static $testClass;

    /**
     * Test Constructor
     */
    public function testConstructor(): void
    {
        self::$testClass = new Client();
        $this->assertClassHasAttribute('client', \get_class(self::$testClass));
        $this->assertClassHasAttribute('dispatcher', \get_class(self::$testClass));
    }

    /**
     * Test make request method
     *
     * @depends testConstructor
     *
     * @throws \Exception
     */
    public function testMakeRequest(): void
    {
        $requestResponse = self::$testClass->accessMakeRequest('views/agenda', []);
        $this->assertIsArray($requestResponse);
    }

    /**
     * Test make request method with exception
     *
     * @depends testConstructor
     *
     * @throws \Exception
     */
    public function testMakeRequestException(): void
    {
        $this->expectException(\RuntimeException::class);
        self::$testClass->accessMakeRequest('bad/response', []);
    }
}
