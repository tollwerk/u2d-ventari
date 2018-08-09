<?php

namespace Tollwerk\Ventari\Tests\Applications;

use Tollwerk\Ventari\Domain\Model\Event;
use Tollwerk\Ventari\Infrastructure\DispatchController;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * BaseController test
 *
 * @package Tollwerk\Ventari\Tests\Application
 */
class DispatchControllerTest extends AbstractTestBase
{
    /**
     * @var DispatchController $testClass
     */
    public static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = new DispatchController();
    }

    /**
     * Test the BaseController
     */
    public function testDispatch(): void
    {
        $json = file_get_contents(\dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'fixture'.DIRECTORY_SEPARATOR.'Events.json');
        $json = json_decode($json)->responseData;
        $this->assertInstanceOf(DispatchController::class, self::$testClass);
        $response = self::$testClass->dispatch('events', $json);
        foreach ($response as $item) {
            $this->assertInstanceOf(Event::class, $item);
        }
    }
}