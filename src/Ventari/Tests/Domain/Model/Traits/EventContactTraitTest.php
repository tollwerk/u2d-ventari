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

    public function testOrganizerEmail(): void
    {
        $expectedString = 'email@server.com';
        $mock           = $this->testTrait;
        $mock->setOrganizerEmail($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerEmail());
    }

    public function testOrganizerFacebook(): void
    {
        $expectedString = 'https://facebook.com/EventPage';
        $mock           = $this->testTrait;
        $mock->setOrganizerFacebook($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerFacebook());
    }

    public function testOrganizerInstagram(): void
    {
        $expectedString = 'https://instagram.com/EventAccount';
        $mock           = $this->testTrait;
        $mock->setOrganizerInstagram($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerInstagram());
    }

    public function testOrganizerWebsite(): void
    {
        $expectedString = 'http://event.link';
        $mock           = $this->testTrait;
        $mock->setOrganizerWebsite($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerWebsite());
    }

    public function testOrganizerLogo(): void
    {
        $expectedString = 'https://server.com/resources/logo.svg';
        $mock           = $this->testTrait;
        $mock->setOrganizerLogo($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerLogo());
    }

    public function testOrganizerName(): void
    {
        $expectedString = 'John Doe';
        $mock           = $this->testTrait;
        $mock->setOrganizerName($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerName());
    }

    public function testOrganizerTwitter(): void
    {
        $expectedString = '@johndoe1';
        $mock           = $this->testTrait;
        $mock->setOrganizerTwitter($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));
        $this->assertEquals($expectedString, $mock->getOrganizerTwitter());
    }
}
