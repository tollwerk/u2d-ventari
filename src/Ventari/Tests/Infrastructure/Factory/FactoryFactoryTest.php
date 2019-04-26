<?php

namespace Tollwerk\Ventari\Tests\Infrastructure\Factory;

use Tollwerk\Ventari\Application\Factory\EventFactory;
use Tollwerk\Ventari\Application\Factory\LocationFactory;
use Tollwerk\Ventari\Application\Factory\SessionFactory;
use Tollwerk\Ventari\Infrastructure\Exception\RuntimeException;
use Tollwerk\Ventari\Infrastructure\Factory\FactoryFactory;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class FactoryFactoryTest extends AbstractTestBase
{
    /**
     * Test factory creation
     *
     * @param string $function Function name
     * @param string $class    Expected class name
     *
     * @dataProvider factoryNames
     */
    public function testCreateFromFunction(string $function, string $class): void
    {
        $testClass = new FactoryFactory();
        $expected  = $testClass::createFromFunction($function);
        $this->assertEquals($class, $expected);
    }

    /**
     * Test creating the factories
     */
    public function testCreateFromFunctionException(): void
    {
        $testClass = new FactoryFactory();
        $this->expectException(RuntimeException::class);
        $testClass::createFromFunction('bad_function_name');
    }

    /**
     * Factory name provider
     *
     * @return array Factory names
     */
    public function factoryNames(): array
    {
        return [
            [EventFactory::FUNCTION_NAME, EventFactory::class],
            [LocationFactory::FUNCTION_NAME, LocationFactory::class],
            [SessionFactory::FUNCTION_NAME, SessionFactory::class],
        ];
    }
}
