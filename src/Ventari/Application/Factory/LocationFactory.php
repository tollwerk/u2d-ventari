<?php

namespace Tollwerk\Ventari\Application\Factory;

use Tollwerk\Ventari\Application\Contract\FactoryInterface;
use Tollwerk\Ventari\Domain\Contract\ModelInterface;
use Tollwerk\Ventari\Domain\Model\Location;

/**
 * Location Factory
 *
 * @package Tollwerk\Ventari\Application\Factory
 */
class LocationFactory implements FactoryInterface
{
    /**
     * Function name
     *
     * @var string
     */
    const FUNCTION_NAME ='Location';

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
     * @return ModelInterface Location
     * @throws \Exception
     */
    public static function createFromJson($json): ModelInterface
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