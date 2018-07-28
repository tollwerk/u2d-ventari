<?php

namespace Tollwerk\Ventari\Tests\Applications;

use Tollwerk\Ventari\Application\BaseController;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * BaseController test
 *
 * @package Tollwerk\Ventari\Tests\Application
 */
class BaseControllerTest extends AbstractTestBase
{
    public static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = BaseController::instance();
    }

    /**
     * Test the BaseController
     */
    public function testConstructor()
    {
        $baseController = self::$testClass;
        $this->assertInstanceOf(BaseController::class, $baseController);
    }

    public function testInstance()
    {
        $this->assertClassHasAttribute('instance', get_class(self::$testClass));
    }
}