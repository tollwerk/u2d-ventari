<?php

namespace Tollwerk\Ventari\Tests\Applications\Factory;

use Tollwerk\Ventari\Application\Factory\LocationFactory;
use Tollwerk\Ventari\Domain\Model\Location;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class LocationFactoryTest extends AbstractTestBase
{
    /**
     * @var LocationFactory $testClass
     */
    public static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = new LocationFactory();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(LocationFactory::class, self::$testClass);
    }

    /**
     * Test createFromJson
     *
     * @dataProvider jsonInputProvider
     */
    public function testCreateFromJson($input)
    {
        $actualJson = self::$testClass->createFromJson($input);
        $this->assertInstanceOf(Location::class, $actualJson);
    }

    public function jsonInputProvider()
    {
        return [
            [
                array(
                    'hotelId'        => 3,
                    'hotelAddress'   => "Prinzregentenufer 3",
                    'hotelTelephone' => "",
                    'rowNum'         => 1,
                    'hotelZip'       => 90489,
                    'hotelName'      => "up2date solutions GmbH",
                    'eventId'        => 1801,
                    'hotelCity'      => "Nürnberg",
                    'hotelFax'       => "091123759913",
                    'hotelEmail'     => "info@up2date-solutions.de"
                )
            ]
        ];
    }
}
