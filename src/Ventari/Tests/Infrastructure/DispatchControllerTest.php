<?php

namespace Tollwerk\Ventari\Tests\Applications;

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
     *
     * @dataProvider jsonInputProvider
     */
    public function testDispatch($json)
    {
        $json = json_decode(json_encode($json));
        $this->assertInstanceOf(DispatchController::class, self::$testClass);

        $response = self::$testClass->dispatch(key($json), $json);

        print_r($response);

//        foreach ($response as $item) {
//            $this->assertInstanceOf(Event::class, $item);
//        }
    }

    public function jsonInputProvider()
    {
        return [
            [
                array(
                    'events' => array(
                        'event_name'       => 'Test Event Name',
                        'event_start_date' => '2018-10-03',
                        'frontendLink'     => 'https://www.domain.com',
                        'event_id'         => '1029'
                    )
                )
            ]
        ];
    }
}