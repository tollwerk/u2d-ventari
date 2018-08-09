<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Application\Factory\LocationFactory;
use Tollwerk\Ventari\Domain\Model\Location;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class LocationTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class LocationTest extends AbstractTestBase
{
    /**
     * @var array
     */
    public $locationApi;

    protected function setUp()
    {
        $factory           = new LocationFactory();
        $this->locationApi = $factory->accessLocationApi();
    }

    /**
     * Test Class Properties
     *
     * @param $input
     *
     * @dataProvider jsonInputProvider
     */
    public function testClass($input): void
    {
        $testClass = new Location();
        $factory   = new LocationFactory();

        foreach ($input as $key => $value){
            $property = (isset($this->locationApi[$key])) ? $this->locationApi[$key] : $this->locationApi['hotelId'];
            $this->assertClassHasAttribute($property, Location::class);

            $setter = 'set'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $setter), $this->equalTo(true));

            $refinedValue = $factory->accessRefineValue($key, $value);
            $testClass->$setter($refinedValue);
            $getter = 'get'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $getter), $this->equalTo(true));
            $this->assertEquals($refinedValue, $testClass->$getter());
        }
    }

    public function jsonInputProvider(): array
    {
        return [
            [
                array(
                    'hotelId'        => 3,
                    'hotelTelephone' => "091123759913",
                    'rowNum'         => 1,
                    'hotelZip'       => 90489,
                    'hotelName'      => "up2date solutions GmbH",
                    'longitude'      => 11.087469,
                    'eventId'        => 1801,
                    'hotelCity'      => "Nürnberg",
                    'hotelFax'       => "091123759913",
                    'hotelAddress'   => "Prinzregentenufer 3",
                    'companyId'      => 1,
                    'latitude'       => 49.45334,
                    'hotelEmail'     => "info@up2date-solutions.de"
                )
            ]
        ];
    }
}
