<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Application\Factory
 * @author     Philip Saa <philip@tollwerk.de> / @cowglow
 * @copyright  Copyright © 2019 Philip Saa <philip@tollwerk.de> / @cowglow
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

/***********************************************************************************
 *  The MIT License (MIT)
 *
 *  Copyright © 2019 Philip Saa <philip@tollwerk.de>
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"), to deal in
 *  the Software without restriction, including without limitation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ***********************************************************************************/

namespace Tollwerk\Ventari\Application\Factory;

use Tollwerk\Ventari\Application\Contract\FactoryInterface;
use Tollwerk\Ventari\Domain\Contract\ModelInterface;
use Tollwerk\Ventari\Domain\Model\Location;

/**
 * Location Factory
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Application\Factory
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
     * Integer based properties
     *
     * @var string[]
     */
    protected static $intProperties = [
        'hotelId',
        'rowNum',
        'eventId',
        'hotelZip',
        'companyId'
    ];

    /**
     * Float based properties
     *
     * @var string[]
     */
    protected static $floatProperties = [
        'longitude',
        'latitude'
    ];

    /**
     * Location API
     *
     * @var array
     */
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

    /**
     * Refine a value based on its property
     *
     * @param string $property Property name
     * @param mixed $value Property value
     *
     * @return mixed Refined property value
     */
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
}