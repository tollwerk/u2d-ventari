<?php

namespace Tollwerk\Ventari\Tests\Domain\Model\Traits;

use Tollwerk\Ventari\Domain\Model\Traits\EventLinkTrait;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class EventLinkTraitTest
 * @package Tollwerk\Ventari\Tests\Domain\Model\Traits
 */
class EventLinkTraitTest extends AbstractTestBase
{
    /**
     * @var EventLinkTrait $testTrait
     */
    public $testTrait;

    protected function setUp()
    {
        $this->testTrait = $this->getMockForTrait(EventLinkTrait::class);
    }

    public function testEventFacebookEvent(): void
    {
        $expectedString = 'expectedString';
        $mock           = $this->testTrait;
        $mock->setEventFacebookEvent($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventFacebookEvent());
    }

    public function testEventTwitterHandle(): void
    {
        $expectedString = '@johndoe1';
        $mock           = $this->testTrait;
        $mock->setEventTwitterHandle($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventTwitterHandle());
    }

    public function testXingEvent(): void
    {
        $expectedString = 'https://xing.de/event/0112358132134';
        $mock           = $this->testTrait;
        $mock->setXingEvent($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getXingEvent());
    }

    public function testEventLivestreamCode(): void
    {
        $expectedString = '0112358132134';
        $mock           = $this->testTrait;
        $mock->setEventLivestreamCode($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventLivestreamCode());
    }

    public function testEventLivestream(): void
    {
        $expectedString = 'https://live.stream.de';
        $mock           = $this->testTrait;
        $mock->setEventLivestream($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventLivestream());
    }
}
