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
use Tollwerk\Ventari\Domain\Model\Participant;

/**
 * Participant Factory
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Application\Factory
 */
class ParticipantFactory implements FactoryInterface
{
    /**
     * Function name
     *
     * @var string
     */
    const FUNCTION_NAME = 'Participant';

    /**
     * Participant API
     *
     * @var array
     */
    protected static $participantApi = [
        // AbstractModel
        'id'       => 'ventariId',

        // Participant Model
        'personId' => 'personId',
        'email'    => 'email'
    ];

    /**
     * Integer based properties
     *
     * @var string[]
     */
    protected static $intProperties = [
        'personId'
    ];

    /**
     * Fields based properties
     *
     * @var string[]
     */
    protected static $fieldsProperties = [
        'fields'
    ];

    /**
     * Create a model instance from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return ModelInterface Model
     * @throws \Exception
     */
    public static function createFromJson($json): ModelInterface
    {
        $participant = new Participant();

        foreach ($json as $key => $value) {
            if (!empty(self::$participantApi[$key])) {
                $setter = 'set'.ucfirst(self::$participantApi[$key]);
                if (\is_callable([$participant, $setter], true)) {
                    $participant->$setter(self::refineValue($key, $value));
                }
            }

            if ($key === 'fields') {
                foreach ($value as $val) {
                    if ($val->anzParamId === 7) {
                        $setter = 'setEmail';
                        $participant->$setter(self::refineValue('email', $val->value));
                    }
                }
            }
        }

        return $participant;
    }

    /**
     * Refine a value based on its property
     *
     * @param string $property Property name
     * @param mixed $value     Property value
     *
     * @return mixed
     */
    protected static function refineValue(string $property, $value)
    {
        $refinedValue = $value;

        if (\in_array($property, self::$intProperties, true)) {
            if (gettype($value) !== 'integer') {
                $refinedValue = 'Empty String';
            } else {
                $refinedValue = (int)$value;
            }
        }

        return $refinedValue;
    }
}