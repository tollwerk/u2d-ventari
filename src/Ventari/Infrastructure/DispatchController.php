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
     */
    public function __invoke($JSON_Object)
    {
        $object = [];

        /**
         * TODO: Add SWITCH CASE for other Factories
         */
        switch(key($JSON_Object)){
            case 'Events':
                $factory = new EventFactory();
                foreach($JSON_Object->Events as $event){
                    array_push($object, $factory->createEventsFromJson($event));
                }
                break;
            default:
                break;
        }

        return $object;
    }

}
