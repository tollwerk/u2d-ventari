<?php

namespace Tollwerk\Ventari\Infrastructure;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Infrastructure\Factory\FactoryFactory;

class DispatchController implements ControllerInterface
{
    /**
     * Dispatch classes
     *
     * @var array
     */
    protected static $dispatchers = [
        'events'    => 'Event',
        'locations' => 'Location',
        'agenda'    => 'Session'
    ];

    /**
     * BaseController constructor.
     *
     * @param $jsonObject
     *
     * @return array
     * @throws \Exception
     */
    public function dispatch($function, $jsonObject): array
    {
        $objects      = [];
        $factoryType = static::$dispatchers[$function];
        $factoryClass = FactoryFactory::createFromFunction($factoryType);

        foreach ($jsonObject->$function as $object) {
            $objects[] = $factoryClass::createFromJson($object);
//            $objects[] = \call_user_func([$factoryClass, 'createFromJson'], $object);
        }

        return $objects;
    }
}
