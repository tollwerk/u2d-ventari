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
    const FUNCTION_NAME = 'Location';

    /**
     * @var array
     */
    protected static $intProperties = [
        'hotelId',
        'rowNum',
        'eventId',
        'hotelZip',
        'companyId'
    ];

    /**
     * @var array
     */
    protected static $floatProperties = [
        'longitude',
        'latitude'
    ];

    protected static $locationApi = [
        // AbstractModel
        'hotelId' => 'ventariId',

        // CommonInteger Trait
        'eventId' => 'eventVentariId', // <-- We need this to associate this with an event

        'hotelAddress'   => 'streetAddress',
        'hotelTelephone' => 'phone',
        'hotelZip'       => 'postalCode',
        'hotelName'      => 'name',
        'hotelCity'      => 'locality',
        'hotelFax'       => 'fax',
        'hotelEmail'     => 'email',
        'companyId'      => 'companyId',
        'longitude'      => 'longitude',
        'latitude'       => 'latitude',
        'hotelRoom'      => 'room'
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
            if (!empty(self::$locationApi[$key])) {
                $setter = 'set'.ucfirst(self::$locationApi[$key]);
                if (\is_callable([$location, $setter], true)) {
                    $location->$setter(self::refineValue($key, $value));
                }
            }
        }

        return $location;
    }

    protected static function refineValue(string $property, $value)
    {
        $refinedValue = $value;

        if (\in_array($property, self::$intProperties, true)) {
            $refinedValue = (int)$value;
        }

        if (\in_array($property, self::$floatProperties, true)) {
            $refinedValue = (float)$value;
        }

        return $refinedValue;
    }

    public function accessRefineValue(string $prop, $val)
    {
        return $this->refineValue($prop, $val);
    }

    public function accessIntProperties(): array
    {
        return self::$intProperties;
    }

    public function accessLocationApi(): array
    {
        return self::$locationApi;
    }
}