<?php

namespace Tollwerk\Ventari\Infrastructure;

use Tollwerk\Ventari\Application\Factory\EventFactory;
use Tollwerk\Ventari\Domain\Contract\ControllerInterface;

class DispatchController implements ControllerInterface
{
    /**
     * Instance of Class
     * @var null
     */
    protected static $instance = null;

    /**
     * BaseController constructor.
     *
     * @param $jsonObject
     *
     * @return array
     * @throws \Exception
     */
    public function __invoke($jsonObject)
    {
        $object = [];

        /**
         * TODO: Add SWITCH CASE for other Factories
         */
        switch (key($jsonObject)) {
            case 'Events':
                $factory = new EventFactory();
                foreach ($jsonObject->Events as $event) {
                    array_push($object, $factory->createEventsFromJson($event));
                }
                break;
            default:
                break;
        }

        return $object;
    }
}