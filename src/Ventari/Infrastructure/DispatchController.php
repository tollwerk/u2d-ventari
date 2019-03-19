<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure
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

namespace Tollwerk\Ventari\Infrastructure;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Infrastructure\Factory\FactoryFactory;

/**
 * Dispatch Controller
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure
 */
class DispatchController implements ControllerInterface
{
    /**
     * Dispatch classes
     *
     * @var array
     */
    protected static $dispatchers = [
        'events'       => 'Event',
        'locations'    => 'Location',
        'agenda'       => 'Session',
        'speakers'     => 'Speaker',
        'participants' => 'Participant'
    ];

    /**
     * BaseController constructor.
     *
     * @param string $function
     * @param \stdClass $jsonObject
     *
     * @return array
     * @throws \Exception
     */
    public function dispatch($function, $jsonObject): array
    {
        $objects = [];

        $factoryType  = static::$dispatchers[$function];
        $factoryClass = FactoryFactory::createFromFunction($factoryType);
        foreach ($jsonObject->$function as $object) {
            $objects[] = $factoryClass::createFromJson($object);
        }

        return $objects;
    }
}
