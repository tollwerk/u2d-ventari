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
use Tollwerk\Ventari\Domain\Model\Session;

/**
 * Session Factory
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Application\Factory
 */
class SessionFactory implements FactoryInterface
{
    /**
     * Function name
     *
     * @var string
     */
    const FUNCTION_NAME = 'Session';

    /**
     * Time based properties
     *
     * @var string[]
     */
    protected static $timeProperties = [
        'sessionStart',
        'sessionEnd',
    ];

    /**
     * Session API
     *
     * @var array
     */
    protected static $sessionApi = [
        // AbstractModel
        'sessionId'            => 'ventariId',

        // CommonInteger Traits
        'eventId'              => 'eventVentariId', // <-- We need this to associate this with an event

        // SessionCategory Traits
        'sessionCategoryColor' => 'categoryColor',
        'sessionCategoryId'    => 'categoryId',
        'sessionCategoryName'  => 'categoryName',

        // SessionLine Traits
        'sessionLineId'        => 'lineId',
        'sessionLineName'      => 'lineName',

        // Session Model
        'sessionName'          => 'name',
        'sessionRemark'        => 'remark',
        'sessionStart'         => 'startDateTime',
        'sessionEnd'           => 'endDateTime',
        'sessionRoom'          => 'room',
    ];

    /**
     * Refine a value based on its property
     *
     * @param string $property Property name
     * @param mixed $value     Property value
     *
     * @return mixed
     * @throws \Exception If a date property cannot get parsed
     */
    protected static function refineValue(string $property, $value)
    {
        $refinedValue = $value;
        if (\in_array($property, self::$timeProperties)) {
            $refinedValue = new \DateTime(str_replace(',', '', $value));
        }

        return $refinedValue;
    }

    /**
     * Create a Session from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return ModelInterface Session
     * @throws \Exception
     */
    public static function createFromJson($json): ModelInterface
    {
        $session = new Session();
        foreach ($json as $key => $value) {
            if (!empty(self::$sessionApi[$key])) {
                $setter = 'set'.ucfirst(self::$sessionApi[$key]);
                if (\is_callable([$session, $setter], true)) {
                    $session->$setter(self::refineValue($key, $value));
                }
            }
        }

        return $session;
    }

    /**
     * Refine value method for unit test
     *
     * @param string $prop
     * @param $val
     *
     * @return mixed
     * @throws \Exception
     */
    public function accessRefineValue(string $prop, $val)
    {
        return $this->refineValue($prop, $val);
    }

    /**
     * Date properties method for unit test
     *
     * @return array
     */
    public function accessDateProperties(): array
    {
        return self::$timeProperties;
    }

    /**
     * Session API method for unit test
     *
     * @return array
     */
    public function accessSessionApi(): array
    {
        return self::$sessionApi;
    }
}