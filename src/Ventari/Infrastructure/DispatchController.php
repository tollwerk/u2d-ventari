<?php

namespace Tollwerk\Ventari\Infrastructure;

use Tollwerk\Ventari\Application\Factory\EventFactory;
use Tollwerk\Ventari\Application\Factory\LocationFactory;
use Tollwerk\Ventari\Application\Factory\SessionFactory;
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
            case 'events':
                $factory = new EventFactory();
                foreach ($jsonObject->events as $event) {
                    $object[] = $factory->createEventsFromJson($event);
                }
                break;
            case 'locations':
                $factory = new LocationFactory();
                foreach ($jsonObject->locations as $location) {
                    $object[] = $factory->createLocationFromJson($location);
                }
                break;
            case 'sessions':
                $factory = new SessionFactory();
                foreach ($jsonObject->agenda as $session) {
                    $object[] = $factory->createSessionFromJson($session);
                }
                break;
            default:
                break;
        }

        return $object;
    }
}
