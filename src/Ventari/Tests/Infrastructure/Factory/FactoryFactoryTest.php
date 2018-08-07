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

        $actual = $testClass->createFromFunction($input[0]);
        $this->assertInstanceOf(EventFactory::class, $actual);

        $actual = $testClass->createFromFunction($input[1]);
        $this->assertInstanceOf(LocationFactory::class, $actual);

        $actual = $testClass->createFromFunction($input[2]);
        $this->assertInstanceOf(SessionFactory::class, $actual);


    }

    public function factoryNames()
    {
        return [
            ['Event'],
            ['Location'],
            ['Session']
        ];
    }
}
