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

    public function testFacebookEvent(): void
    {
        $expectedString = 'expectedString';
        $mock           = $this->testTrait;
        $mock->setFacebookEvent($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getFacebookEvent());
    }

    public function testTwitter(): void
    {
        $expectedString = '@johndoe1';
        $mock           = $this->testTrait;
        $mock->setTwitter($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getTwitter());
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

    public function testLivestreamEmbed(): void
    {
        $expectedString = '0112358132134';
        $mock           = $this->testTrait;
        $mock->setLivestreamEmbed($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getLivestreamEmbed());
    }

    public function testLivestream(): void
    {
        $expectedString = 'https://live.stream.de';
        $mock           = $this->testTrait;
        $mock->setLivestream($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getLivestream());
    }

    public function testTicketUrl(): void
    {
        $expectedString = 'https://ticket.service.com/?eventID=1235813';
        $mock           = $this->testTrait;
        $mock->setTicketUrl($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getTicketUrl());
    }

    public function testWebsite(): void
    {
        $expectedString = 'https://event.website.de';
        $mock           = $this->testTrait;
        $mock->setWebsite($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getWebsite());
    }
}
