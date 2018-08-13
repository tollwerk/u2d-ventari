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
        $expectedDate = new \DateTime('now');
        $mock         = $this->testTrait;
        $mock->setStartDateTime($expectedDate);
        $mock->expects($this->any())
             ->method('abstractMethodForDate')
             ->will($this->returnValue($expectedDate));

        $this->assertEquals($expectedDate, $mock->getStartDateTime());
    }

    public function testEndDateTime(): void
    {
        $expectedDate = new \DateTime('now');
        $mock         = $this->testTrait;
        $mock->setEndDateTime($expectedDate);
        $mock->expects($this->any())
             ->method('abstractMethodForDate')
             ->will($this->returnValue($expectedDate));

        $this->assertEquals($expectedDate, $mock->getEndDateTime());
    }
}
