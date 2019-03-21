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
     * Test the BaseController
     */
    public function testDispatch(): void
    {
        $testClass = new DispatchController();
        $json = file_get_contents(\dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'fixtures'.DIRECTORY_SEPARATOR.'events.json');
        $json = json_decode($json)->responseData;
        $this->assertInstanceOf(DispatchController::class, $testClass);
        $response = $testClass->dispatch('events', $json);
        foreach ($response as $item) {
            $this->assertInstanceOf(Event::class, $item);
        }
    }
}