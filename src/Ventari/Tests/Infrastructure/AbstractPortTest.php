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
        $config          = require dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
        self::$testClass = new AbstractPort('GET', 'https://events.nueww.de/rest/', $config['authentication']);
    }

    /**
     * Test Constructor
     */
    public function testConstructor()
    {
        $this->assertClassHasAttribute('client', get_class(self::$testClass));
        $this->assertClassHasAttribute('dispatcher', get_class(self::$testClass));
    }

//    public function testMakeRequest()
//    {
//        $requestReponse = self::$testClass->accessMakeRequest('views/agenda', []);
//        $this->assertInstanceOf(DispatchController::class, $requestReponse);
//    }
}
