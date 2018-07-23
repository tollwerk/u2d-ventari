<?php
/**
 * Created by PhpStorm.
 * User: tollwerk
 * Date: 21.07.2018
 * Time: 18:50
 */

namespace Tollwerk\Ventari\Tests\Ports;

use Tollwerk\Ventari\Ports\Demo;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Demo test
 *
 * @package Tollwerk\Ventari\Tests\Ports
 */
class DemoTest extends AbstractTestBase
{
    /**
     * Test the demo class
     */
    public function testDemo() {
        $property = md5(rand());
        $demo = new Demo($property);
        $this->assertInstanceOf(Demo::class, $demo);
        $this->assertEquals($property, $demo->getProperty());

        $property2 = md5(rand());
        $demo->setProperty($property2);
        $this->assertEquals($property2, $demo->getProperty());

//        $this->assertEquals([1], [2]);
        $this->assertJsonStringEqualsJsonFile( dirname(__DIR__).DIRECTORY_SEPARATOR.'Fixture'.DIRECTORY_SEPARATOR.'result.json', '{"foo":"bar"}');
    }
}
