<?php

namespace Tollwerk\Ventari\Tests\Applications;

use phpDocumentor\Reflection\Types\Array_;
use PHPUnit\Util\Json;
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
    public static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = new DispatchController();
    }

    /**
     * Test the BaseController
     *
     * @dataProvider jsonInputProvider
     */
    public function testConstructor($json)
    {
        $this->assertInstanceOf(DispatchController::class, self::$testClass);

        $json = json_decode(json_encode($json));
        $this->assertEquals('Events', key($json));
        $dispatchController = new DispatchController();
        $response           = $dispatchController($json);

        foreach ($response as $item) {
            $this->assertInstanceOf(Event::class, $item);
        }
    }

    public function testInstance()
    {
        $this->assertClassHasAttribute('instance', get_class(self::$testClass));
    }

    public function jsonInputProvider()
    {
        return [
            [
                array(
                    'Events' => array(
                        array(
                            'eventName'    => 'Test Event Name',
                            'eventstart'   => '2018-10-03',
                            'frontendLink' => 'https://www.domain.com',
                            'eventId'      => '1029'
                        )
                    )
                )
            ]
        ];
    }
}