<?php

namespace Tollwerk\Ventari\Infrastructure\Factory;

use Tollwerk\Ventari\Application\Contract\FactoryInterface;
use Tollwerk\Ventari\Application\Factory\EventFactory;
use Tollwerk\Ventari\Application\Factory\LocationFactory;
use Tollwerk\Ventari\Application\Factory\SessionFactory;
use Tollwerk\Ventari\Application\Factory\SpeakerFactory;
use Tollwerk\Ventari\Infrastructure\Exception\RuntimeException;

class FactoryFactory
{
    /**
     * Factory classes
     *
     * @var array
     */
    protected static $factories = [
        EventFactory::FUNCTION_NAME    => EventFactory::class,
        LocationFactory::FUNCTION_NAME => LocationFactory::class,
        SessionFactory::FUNCTION_NAME  => SessionFactory::class,
        SpeakerFactory::FUNCTION_NAME  => SpeakerFactory::class,
    ];

    /**
     * Create a factory from a function string
     *
     * @param string $function Function string
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
