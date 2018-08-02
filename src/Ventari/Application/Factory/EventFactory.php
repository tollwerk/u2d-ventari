<?php

namespace Tollwerk\Ventari\Application\Factory;

use Tollwerk\Ventari\Domain\Contract\EventInterface;
use Tollwerk\Ventari\Domain\Model\Event\Event;

/**
 * Event Factory
 *
 * @package Tollwerk\Ventari\Application\Factory
 */
class EventFactory
{
    /**
     * Date based properties
     *
     * @var string[]
     */
    protected static $dateProperties = ['eventstart'];

    /**
     * Create an event from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return EventInterface Event
     * @throws \Exception
     */
    public static function createEventsFromJson($json)
    {
        $event = new Event();

        // Run through all JSON properties
        foreach ($json as $key => $value) {
            $setter = 'set'.ucfirst($key);
            if (is_callable([$event, $setter])) {
                $event->$setter(self::refineValue($key, $value));
            }
        }

        return $event;
    }

    /**
     * Refine a value based on its property
     *
     * @param string $property  Property name
     * @param string|int $value Property value
     *
     * @return mixed Refined property value
     * @throws \Exception If a date property cannot get parsed
     */
    protected static function refineValue(string $property, $value)
    {
        $refinedValue = $value;

        // Convert date based properties

        if (in_array($property, self::$dateProperties)) {
            $refinedValue = new \DateTimeImmutable($value);
        }

        return $refinedValue;
    }

    public function accessRefineValue(string $prop, $val)
    {
        return $this->refineValue($prop, $val);
    }
}
