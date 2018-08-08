<?php

namespace Tollwerk\Ventari\Tests\Infrastructure\Factory;

use Tollwerk\Ventari\Application\Factory\EventFactory;
use Tollwerk\Ventari\Application\Factory\LocationFactory;
use Tollwerk\Ventari\Application\Factory\SessionFactory;
use Tollwerk\Ventari\Infrastructure\Factory\FactoryFactory;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class FactoryFactoryTest extends AbstractTestBase
{

    /**
     * @dataProvider factoryNames
     */
    public function testCreateFromFunction($input)
    {
        $testClass = new FactoryFactory();

        $expected = $testClass::createFromFunction($input[0]);
        $this->assertEquals($expected, EventFactory::class);

        $expected = $testClass::createFromFunction($input[1]);
        $this->assertEquals($expected, LocationFactory::class);

        $expected = $testClass::createFromFunction($input[2]);
        $this->assertEquals($expected, SessionFactory::class);


    }

    public function factoryNames()
    {
        return [
            [['Event','Location','Session']],
        ];
    }
}
