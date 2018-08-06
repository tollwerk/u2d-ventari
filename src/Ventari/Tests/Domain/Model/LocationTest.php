<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\Location;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class LocationTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class LocationTest extends AbstractTestBase
{
    public $testClass;

    protected function setUp()
    {
        $this->testClass = new Location();
    }

    public function testClass(): void
    {
        $this->assertInstanceOf(Location::class, $this->testClass);
    }

    public function testId(): void
    {
        $expectedValue = 12358;
        $location      = $this->testClass;
        $location->setId($expectedValue);
        $this->assertEquals($expectedValue, $this->testClass->getId());
    }

    public function testLocationAddress(): void
    {
        $expectedString = 'Königstorgraben 11';
        $location       = $this->testClass;
        $location->setLocationAddress($expectedString);
        $this->assertEquals($expectedString, $location->getLocationAddress());
    }

    public function testLocationTelephone(): void
    {
        $expectedValue = '+49 911 4567 9112';
        $location      = $this->testClass;
        $location->setLocationTelephone($expectedValue);
        $this->assertEquals($expectedValue, $location->getLocationTelephone());
    }

    public function testRowNum(): void
    {
        $expectedValue = 12358;
        $location      = $this->testClass;
        $location->setRowNum($expectedValue);
        $this->assertEquals($expectedValue, $location->getRowNum());
    }

    public function testLocationZip(): void
    {
        $expectedValue = 90402;
        $location      = $this->testClass;
        $location->setLocationZip($expectedValue);
        $this->assertEquals($expectedValue, $location->getLocationZip());
    }

    public function testLocationName(): void
    {
        $expectedString = 'Holiday Inn';
        $location       = $this->testClass;
        $location->setLocationName($expectedString);
        $this->assertEquals($expectedString, $location->getLocationName());
    }

    public function testEventId(): void
    {
        $expectedValue = 12348;
        $location      = $this->testClass;
        $location->setEventId($expectedValue);
        $this->assertEquals($expectedValue, $location->getEventId());
    }

    public function testLocationCity(): void
    {
        $expectedValue = 'Nürnberg';
        $location      = $this->testClass;
        $location->setLocationCity($expectedValue);
        $this->assertEquals($expectedValue, $location->getLocationCity());
    }

    public function testLocationFax(): void
    {
        $expectedValue = '+49 911 4567 9112';
        $location      = $this->testClass;
        $location->setLocationFax($expectedValue);
        $this->assertEquals($expectedValue, $location->getLocationFax());
    }

    public function testLocationEmail(): void
    {
        $expectedString = 'user@mail-server.net';
        $location       = $this->testClass;
        $location->setLocationEmail($expectedString);
        $this->assertEquals($expectedString, $location->getLocationEmail());
    }
}
