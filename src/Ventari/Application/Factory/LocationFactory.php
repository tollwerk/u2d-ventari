<?php

namespace Tollwerk\Ventari\Application\Factory;

use Tollwerk\Ventari\Domain\Contract\LocationInterface;
use Tollwerk\Ventari\Domain\Model\Location;

/**
 * Location Factory
 *
 * @package Tollwerk\Ventari\Application\Factory
 */
class LocationFactory
{
    protected static $locationApi = [
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
    public static function createLocationFromJson($json): LocationInterface
    {
        $location = new Location();

        foreach ($json as $key => $value) {
            $setter = 'set'.self::$locationApi[$key];

            if (\is_callable([$location, $setter], true)) {
                $location->$setter($value);
            }
        }

        return $location;
    }
}