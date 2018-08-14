<?php

namespace Tollwerk\Ventari\Application\Factory;

use Tollwerk\Ventari\Application\Contract\FactoryInterface;
use Tollwerk\Ventari\Domain\Contract\ModelInterface;
use Tollwerk\Ventari\Domain\Model\Session;

/**
 * Session Factory
 *
 * @package Tollwerk\Ventari\Application\Factory
 */
class SessionFactory implements FactoryInterface
{
    /**
     * Function name
     *
     * @var string
     */
    const FUNCTION_NAME = 'Session';

    /**
     * Time based properties
     *
     * @var string[]
     */
    protected static $timeProperties = [
        'sessionStart',
        'sessionEnd',
    ];

    protected static $sessionApi = [
        // AbstractModel
        'sessionId'            => 'ventariId',

        // CommonInteger Traits
        'eventId'              => 'eventVentariId', // <-- We need this to associate this with an event

        // SessionCategory Traits
        'sessionCategoryColor' => 'categoryColor',
        'sessionCategoryId'    => 'categoryId',
        'sessionCategoryName'  => 'categoryName',

        // SessionLine Traits
        'sessionLineId'        => 'lineId',
        'sessionLineName'      => 'lineName',

        // Session Model
        'sessionName'          => 'name',
        'sessionRemark'        => 'remark',
        'sessionStart'         => 'startTime',
        'sessionEnd'           => 'endTime',
        'sessionRoom'          => 'room',
    ];

    /**
     * Create a Session from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return ModelInterface Session
     * @throws \Exception
     */
    public static function createFromJson($json): ModelInterface
    {
        $session = new Session();
        foreach ($json as $key => $value) {
            if (!empty(self::$sessionApi[$key])) {
                $setter = 'set'.ucfirst(self::$sessionApi[$key]);
                if (\is_callable([$session, $setter], true)) {
                    $session->$setter(self::refineValue($key, $value));
                }
            }
        }

        return $session;
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
        if (\in_array($property, self::$timeProperties)) {
            $refinedValue = new \DateTime(str_replace(',', '', $value));
        }

        return $refinedValue;
    }

    public function accessRefineValue(string $prop, $val)
    {
        return $this->refineValue($prop, $val);
    }

    public function accessDateProperties(): array
    {
        return self::$timeProperties;
    }

    public function accessSessionApi(): array
    {
        return self::$sessionApi;
    }
}