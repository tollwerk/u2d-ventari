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
