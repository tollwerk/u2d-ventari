<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Infrastructure\AbstractPort;
use Tollwerk\Ventari\Infrastructure\DispatchController;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class AbstractPortTest extends AbstractTestBase
{
    /**
     * @var AbstractPort $testClass
     */
    protected static $testClass;

    public static function setUpBeforeClass()
    {
        $config = ['method' => 'GET', 'api' => 'https://events.nueww.de/rest/', 'authentication' => ['username' => 'username', 'password' => 'password']];
        self::$testClass = new AbstractPort($config['method'], $config['api'], $config['authentication']);
    }

    /**
     * Test Constructor
     */
    public function testConstructor(): void
    {
        $this->assertClassHasAttribute('client', get_class(self::$testClass));
        $this->assertClassHasAttribute('dispatcher', get_class(self::$testClass));
    }

//    public function testMakeRequest(): void
//    {
//        $requestReponse = self::$testClass->accessMakeRequest('views/agenda', []);
//        $this->assertInstanceOf(DispatchController::class, $requestReponse);
//    }
}
