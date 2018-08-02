<?php

namespace Tollwerk\Ventari\Tests\Domain\Model\Traits;

use Tollwerk\Ventari\Domain\Model\Traits\EventContactTrait;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class EventContactTraitTest
 * @package Tollwerk\Ventari\Tests\Domain\Model\Traits
 */
class EventContactTraitTest extends AbstractTestBase
{
    /**
     * @var EventContactTrait $testTrait
     */
    public $testTrait;

    protected function setUp()
    {
        $this->testTrait = $this->getMockForTrait(EventContactTrait::class);
    }

    public function testGetEventContactEmail(): void
    {
        $expectedString = 'email@server.com';
        $mock           = $this->testTrait;
        $mock->setEventContactEmail($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventContactEmail());
    }

    public function testGetEventContactFacebook(): void
    {
        $expectedString = 'https://facebook.com/EventPage';
        $mock           = $this->testTrait;
        $mock->setEventContactFacebook($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventContactFacebook());
    }

    public function testGetEventContactInstagram(): void
    {
        $expectedString = 'https://instagram.com/EventAccount';
        $mock           = $this->testTrait;
        $mock->setEventContactInstagram($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventContactInstagram());
    }

    public function testGetEventContactLinks(): void
    {
        $expectedString = 'http://event.link';
        $mock           = $this->testTrait;
        $mock->setEventContactLinks($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventContactLinks());
    }

    public function testEventContactLogo(): void
    {
        $expectedString = 'https://server.com/resources/logo.svg';
        $mock           = $this->testTrait;
        $mock->setEventContactLogo($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventContactLogo());
    }

    public function testEventContactName(): void
    {
        $expectedString = 'John Doe';
        $mock           = $this->testTrait;
        $mock->setEventContactName($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getEventContactName());
    }

    public function testEventContactTwitterHandle(): void
    {
        $expectedString = '@johndoe1';
        $mock           = $this->testTrait;
        $mock->setEventContactTwitterHandle($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));
        $this->assertEquals($expectedString, $mock->getEventContactTwitterHandle());
    }
}
