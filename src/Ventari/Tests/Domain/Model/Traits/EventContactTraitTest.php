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

    public function testOrganizerEmail(): void
    {
        $expectedString = 'email@server.com';
        $mock           = $this->getMockForTrait(EventContactTrait::class);
        $mock->setOrganizerEmail($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerEmail());
    }

    public function testOrganizerFacebook(): void
    {
        $expectedString = 'https://facebook.com/EventPage';
        $mock           = $this->getMockForTrait(EventContactTrait::class);
        $mock->setOrganizerFacebook($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerFacebook());
    }

    public function testOrganizerInstagram(): void
    {
        $expectedString = 'https://instagram.com/EventAccount';
        $mock           = $this->getMockForTrait(EventContactTrait::class);
        $mock->setOrganizerInstagram($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerInstagram());
    }

    public function testOrganizerOtherLink(): void
    {
        $expectedString = 'http://other.link';
        $mock           = $this->getMockForTrait(EventContactTrait::class);
        $mock->setOrganizerOtherLink($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerOtherLink());
    }

    public function testOrganizerWebsite(): void
    {
        $expectedString = 'http://event.link';
        $mock           = $this->getMockForTrait(EventContactTrait::class);
        $mock->setOrganizerWebsite($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerWebsite());
    }

    public function testOrganizerLogo(): void
    {
        $expectedString = 'https://server.com/resources/logo.svg';
        $mock           = $this->getMockForTrait(EventContactTrait::class);
        $mock->setOrganizerLogo($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerLogo());
    }

    public function testOrganizerName(): void
    {
        $expectedString = 'John Doe';
        $mock           = $this->getMockForTrait(EventContactTrait::class);
        $mock->setOrganizerName($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getOrganizerName());
    }

    public function testOrganizerTwitter(): void
    {
        $expectedString = '@johndoe1';
        $mock           = $this->getMockForTrait(EventContactTrait::class);
        $mock->setOrganizerTwitter($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));
        $this->assertEquals($expectedString, $mock->getOrganizerTwitter());
    }
}
