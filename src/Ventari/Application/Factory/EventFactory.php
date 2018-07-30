<?php
/**
 * Created by PhpStorm.
 * User: tollwerk
 * Date: 30.07.2018
 * Time: 16:31
 */

namespace Tollwerk\Ventari\Application\Factory;

use Tollwerk\Ventari\Domain\Contract\EventInterface;
use Tollwerk\Ventari\Domain\Model\Event;

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
    protected static $dateProperties = ['createDate'];

    /**
     * Create an event from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return EventInterface Event
     * @throws \Exception
     */
    public static function createFromJson(\stdClass $json): EventInterface
    {
        $event = new Event();

        // Run through all JSON properties
        foreach ($json as $property => $value) {
            $setter = 'set'.ucfirst($property);
            if (is_callable([$event, $setter])) {
                $event->$setter(self::refineValue($property, $value));
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
    protected static function refineValue(string $property, $value): mixed
    {
        $refinedValue = $value;

        // Convert date based properties
        if (in_array($property, self::$dateProperties)) {
            $refinedValue = new \DateTimeImmutable($value);
        }

        return $refinedValue;
    }
}
