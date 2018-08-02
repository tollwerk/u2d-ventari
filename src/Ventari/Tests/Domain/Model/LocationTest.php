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

    public function testHotelId(): void
    {
        $expectedValue = 12358;
        $location      = $this->testClass;
        $location->setHotelId($expectedValue);
        $this->assertEquals($expectedValue, $this->testClass->getHotelId());
    }

    public function testHotelAddress(): void
    {
        $expectedString = 'Königstorgraben 11';
        $location       = $this->testClass;
        $location->setHotelAddress($expectedString);
        $this->assertEquals($expectedString, $location->getHotelAddress());
    }

    public function testHotelTelephone(): void
    {
        $expectedValue = '+49 911 4567 9112';
        $location      = $this->testClass;
        $location->setHotelTelephone($expectedValue);
        $this->assertEquals($expectedValue, $location->getHotelTelephone());
    }

    public function testRowNum(): void
    {
        $expectedValue = 12358;
        $location      = $this->testClass;
        $location->setRowNum($expectedValue);
        $this->assertEquals($expectedValue, $location->getRowNum());
    }

    public function testHotelZip(): void
    {
        $expectedValue = 90402;
        $location      = $this->testClass;
        $location->setHotelZip($expectedValue);
        $this->assertEquals($expectedValue, $location->getHotelZip());
    }

    public function testHotelName(): void
    {
        $expectedString = 'Holiday Inn';
        $location       = $this->testClass;
        $location->setHotelName($expectedString);
        $this->assertEquals($expectedString, $location->getHotelName());
    }

    public function testEventId(): void
    {
        $expectedValue = 12348;
        $location      = $this->testClass;
        $location->setEventId($expectedValue);
        $this->assertEquals($expectedValue, $location->getEventId());
    }

    public function testHotelCity(): void
    {
        $expectedValue = 'Nürnberg';
        $location      = $this->testClass;
        $location->setHotelCity($expectedValue);
        $this->assertEquals($expectedValue, $location->getHotelCity());
    }

    public function testHotelFax(): void
    {
        $expectedValue = '+49 911 4567 9112';
        $location      = $this->testClass;
        $location->setHotelFax($expectedValue);
        $this->assertEquals($expectedValue, $location->getHotelFax());
    }

    public function testHotelEmail(): void
    {
        $expectedString = 'user@mail-server.net';
        $location       = $this->testClass;
        $location->setHotelEmail($expectedString);
        $this->assertEquals($expectedString, $location->getHotelEmail());
    }
}
