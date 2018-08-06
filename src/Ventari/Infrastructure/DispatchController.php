<?php

namespace Tollwerk\Ventari\Infrastructure;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Infrastructure\Factory\FactoryFactory;

class DispatchController implements ControllerInterface
{
    /**
     * BaseController constructor.
     *
     * @param $jsonObject
     *
     * @return array
     * @throws \Exception
     */
    public function dispatch($function, $jsonObject)
    {
        $factoryClass = FactoryFactory::createFromFunction($function);
        $objects      = call_user_func([$factoryClass, 'createFromJson'], $jsonObject);

        return $objects;
    }
}
