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
        echo 'Sending JSON to Corresponding Factory<br>';

        /**
         *
         */
        switch(key($JSON_Object)){
            case 'Events':
                echo 'Using \'Event\' Factory<br>';
                $factory = new EventFactory();
                $object[] = $factory->createEventsFromJson($JSON_Object->Events);
                break;
            default:
                echo 'No Factory for your JSON Object<br>';
                break;
        }

        return $object;
    }

}
