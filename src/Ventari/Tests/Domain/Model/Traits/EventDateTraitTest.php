<?php

namespace Tollwerk\Ventari\Tests\Domain\Model\Traits;

use Tollwerk\Ventari\Domain\Model\Traits\EventDateTrait;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class EventDateTraitTest
 * @package Tollwerk\Ventari\Tests\Domain\Model\Traits
 */
class EventDateTraitTest extends AbstractTestBase
{
    /**
     * @var EventDateTrait $testTrait
     */
    public $testTrait;

    protected function setUp()
    {
        $this->testTrait = $this->getMockForTrait(EventDateTrait::class);
    }

    public function testStartDateTime(): void
    {
        $expectedDate = new \DateTime('@0');
//        $expectedDate = $date->getTimestamp();
        $modifiers    = [
            'year'  => $expectedDate->format('Y'),
            'month' => $expectedDate->format('n'),
            'day'   => $expectedDate->format('j'),
            'hour' => $expectedDate->format('G'),
            'minute' => (int) ltrim($expectedDate->format('i'), '0')
        ];
        $mock         = $this->testTrait;
        $mock->setStartDateTime($modifiers);
        $mock->expects($this->any())
             ->method('abstractMethodForDate')
             ->will($this->returnValue($modifiers));

        $this->assertEquals($expectedDate, $mock->getStartDateTime());
    }

    public function testEndDateTime(): void
    {
        $expectedDate = new \DateTime('@0');
        $modifiers    = [
            'year'  => $expectedDate->format('Y'),
            'month' => $expectedDate->format('n'),
            'day'   => $expectedDate->format('j'),
            'hour' => $expectedDate->format('G'),
            'minute' => (int) ltrim($expectedDate->format('i'), '0')
        ];
        $mock         = $this->testTrait;
        $mock->setEndDateTime($modifiers);
        $mock->expects($this->any())
             ->method('abstractMethodForDate')
             ->will($this->returnValue($modifiers));

        $this->assertEquals($expectedDate, $mock->getEndDateTime());
    }
}
