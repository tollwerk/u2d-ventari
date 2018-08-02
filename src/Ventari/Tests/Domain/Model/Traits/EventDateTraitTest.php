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

    public function testEventStartDate(): void
    {
        $expectedDate = new \DateTimeImmutable('now');
        $mock = $this->testTrait;
        $mock->setEventStartDate($expectedDate);
        $mock->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue($expectedDate));

        $this->assertEquals($expectedDate, $mock->getEventStartDate());
    }

    public function testEventStartTime(): void
    {
        $expectedDate = new \DateTimeImmutable('now');
        $mock = $this->testTrait;
        $mock->setEventStartTime($expectedDate);
        $mock->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue($expectedDate));

        $this->assertEquals($expectedDate, $mock->getEventStartTime());
    }

    public function testEventEndDate(): void
    {
        $expectedDate = new \DateTimeImmutable('now');
        $mock = $this->testTrait;
        $mock->setEventEndDate($expectedDate);
        $mock->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue($expectedDate));

        $this->assertEquals($expectedDate, $mock->getEventEndDate());

        $mock->setEventEndTime($expectedDate);
        $mock->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue($expectedDate));

        $this->assertEquals($expectedDate, $mock->getEventEndTime());
    }
}
