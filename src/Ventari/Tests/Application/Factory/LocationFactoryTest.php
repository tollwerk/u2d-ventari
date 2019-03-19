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

    /**
     * Test the Instance of LocationFactory
     */
    public function testConstructor(): void
    {
        self::$testClass = new LocationFactory();
        $this->assertInstanceOf(LocationFactory::class, self::$testClass);
    }

    /**
     * Test createFromJson
     *
     * @param $input
     *
     * @depends testConstructor
     *
     * @dataProvider jsonInputProvider
     * @throws \Exception
     */
    public function testCreateFromJson($input): void
    {
        $actualJson = self::$testClass->createFromJson($input);
        $this->assertInstanceOf(Location::class, $actualJson);
    }

    /**
     * Test refineValue
     *
     * @param $input
     *
     * @depends testConstructor
     *
     * @dataProvider jsonInputProvider
     */
    public function testRefineValue($input): void
    {
        $intProps = self::$testClass->accessIntProperties();
        $this->assertIsArray($intProps);
        $input = json_decode(json_encode($input));

        foreach ($input as $key => $value) {
            $actual = self::$testClass->accessRefineValue($key, $value);
            if (in_array($key, $intProps)) {
                $this->assertIsInt($actual);
            } else {
                $this->assertIsString($actual);
            }
        }

    }

    public function jsonInputProvider(): array
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
