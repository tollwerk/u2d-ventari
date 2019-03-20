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
    /**
     * Test Location
     *
     * @param $property
     * @param $value
     *
     * @dataProvider getLocationData
     */
    public function testLocation($property, $value): void
    {
        $location = new Location();

        $setter = 'set'.ucfirst($property);
        $getter = 'get'.ucfirst($property);

        $location->$setter($value);
        $this->assertEquals($value, $location->$getter());
    }

    public function getLocationData(): array
    {
        return [
            /* Common Integer Trait */
            ['eventVentariId', 0],

            /* Model specific properties */
            ['streetAddress', ''],
            ['phone', ''],
            ['postalCode', 0],
            ['name', ''],
            ['locality', ''],
            ['room', ''],
            ['fax', ''],
            ['email', ''],
            ['companyId', 0],
            ['longitude', 0],
            ['latitude', 0]
        ];
    }
}
