<?php

namespace Tollwerk\Ventari\Tests\Applications;

use Tollwerk\Ventari\Domain\Model\Event;
use Tollwerk\Ventari\Domain\Model\Location;
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
     * Test dispatching events
     */
    public function testDispatchEvents(): void
    {
        $testClass = new DispatchController();
        $this->assertInstanceOf(DispatchController::class, $testClass);
        $response = $testClass->dispatch('events', $this->getJsonFixture('events'));
        foreach ($response as $item) {
            $this->assertInstanceOf(Event::class, $item);
        }
    }

    /**
     * Test dispatching locations
     */
    public function testDispatchLocation(): void
    {
        $testClass = new DispatchController();
        $this->assertInstanceOf(DispatchController::class, $testClass);
        $response = $testClass->dispatch('locations', $this->getJsonFixture('views-locations'));
        foreach ($response as $item) {
            $this->assertInstanceOf(Location::class, $item);
        }
    }

    /**
     * Return the contents of a fixture file
     *
     * @param string $name Fixture file name
     *
     * @return \stdClass|null Fixture data
     */
    protected function getJsonFixture(string $name)
    {
        $json = file_get_contents(\dirname(__DIR__, 4).DIRECTORY_SEPARATOR
                                  .'public'.DIRECTORY_SEPARATOR.'json'.DIRECTORY_SEPARATOR.$name.'.json');

        return $json ? json_decode($json)->responseData : null;
    }
}
