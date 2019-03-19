<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure\Factory
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

namespace Tollwerk\Ventari\Infrastructure\Factory;

use Tollwerk\Ventari\Application\Factory\EventFactory;
use Tollwerk\Ventari\Application\Factory\LocationFactory;
use Tollwerk\Ventari\Application\Factory\ParticipantFactory;
use Tollwerk\Ventari\Application\Factory\SessionFactory;
use Tollwerk\Ventari\Application\Factory\SpeakerFactory;
use Tollwerk\Ventari\Infrastructure\Exception\RuntimeException;

/**
 * Factory Factory
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure\Factory
 */
class FactoryFactory
{
    /**
     * Factory classes
     *
     * @var array
     */
    protected static $factories = [
        EventFactory::FUNCTION_NAME       => EventFactory::class,
        LocationFactory::FUNCTION_NAME    => LocationFactory::class,
        SessionFactory::FUNCTION_NAME     => SessionFactory::class,
        SpeakerFactory::FUNCTION_NAME     => SpeakerFactory::class,
        ParticipantFactory::FUNCTION_NAME => ParticipantFactory::class
    ];

    /**
     * Create a factory from a function string
     *
     * @param string $function Function string
     *
     * @return mixed
     */
    public static function createFromFunction(string $function)
    {
        if (!isset(static::$factories[$function])) {
            $message = sprintf(RuntimeException::METHOD_UNDEFINED_STR, $function);
            throw new RuntimeException($message, RuntimeException::METHOD_UNDEFINED);
        }

        return static::$factories[$function];
    }
}
