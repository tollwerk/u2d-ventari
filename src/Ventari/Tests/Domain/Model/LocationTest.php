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

    /**
     * Location data provider
     *
     * @return array
     */
    public function getLocationData(): array
    {
        return [
            /* Common Integer Trait */
            ['eventVentariId', 0],

            /* Ventari ID */
            ['ventariId', 361],

            /* Model specific properties */
            ['streetAddress', 'Klingenhofstrasse 5'],
            ['phone', '+49 911 123456'],
            ['postalCode', 90411],
            ['name', 'tollwerkstatt'],
            ['locality', 'Nürnberg'],
            ['fax', '+49 911 123456'],
            ['email', 'events@tollwerkstatt.de'],
            ['longitude', 0],
            ['latitude', 0],
            ['url', 'https://example.com'],
            ['summary', 'Veranstaltungsbereich der Web- und Werbeagentur tollwerk'],
            [
                'description',
                'Stück für Stück entsteht in Nürnberg seit April 2016 eine neue Plattform für kreative Tech-Events: Die tollwerkstatt. Ziel des ehrgeizigen Projekts ist es, der lokalen IT- und Open-Source-Community einen Ort für regelmäßige Treffen und offenen Wissensaustausch zu bieten.'
            ],
        ];
    }
}
