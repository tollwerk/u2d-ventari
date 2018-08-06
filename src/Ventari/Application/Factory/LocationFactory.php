<?php

namespace Tollwerk\Ventari\Application\Factory;

use Tollwerk\Ventari\Domain\Contract\LocationInterface;

/**
 * Location Factory
 *
 * @package Tollwerk\Ventari\Application\Factory
 */
class LocationFactory
{
    protected static $eventApi = [
        'hotelId'        => 'Id',
        'hotelAddress'   => 'LocationAddress',
        'hotelTelephone' => 'LocationTelephone',
        'rowNum'         => 'RowNum',
        'hotelZip'       => 'LocationZip',
        'hotelName'      => 'LocationName',
        'eventId'        => 'EventId',
        'hotelCity'      => 'LocationCity',
        'hotelFax'       => 'LocationFax',
        'hotelEmail'     => 'LocationEmail',
    ];

    /**
     * Create a Location from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return LocationInterface Location
     * @throws \Exception
     */
    public static function createLocationsFromJson($json)
    {
        $location = new Location();

        foreach ($json as $key => $value) {
            $setter = 'set'.self::$eventApi[$key];

            if (is_callable([$location, $setter], true)) {
                $location->$setter($value);
            }
        }

        return $location;
    }
}