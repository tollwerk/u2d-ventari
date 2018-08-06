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
     * Date based properties
     *
     * @var string[]
     */
    protected static $dateProperties = [
        'sessionStart',
        'sessionEnd',
    ];

    protected static $sessionApi = [
        'sessionId'            => 'Id',
        'sessionName'          => 'SessionName',
        'sessionRemark'        => 'SessionRemark',
        'sessionStart'         => 'SessionStart',
        'sessionEnd'           => 'SessionEnd',
        'rowNum'               => 'RowNum',
        'eventId'              => 'EventId',
        'sessionCategoryColor' => 'SessionCategoryColor',
        'sessionCategoryId'    => 'SessionCategoryId',
        'sessionCategoryName'  => 'SessionCategoryName',
        'sessionSignposting'   => 'SessionSignposting',
        'sessionLineId'        => 'SessionLineId',
        'sessionLineName'      => 'SessionLineName',
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

        echo $json;
        foreach ($json as $key => $value) {
            $setter = 'set'.self::$sessionApi[$key];
            if (\is_callable([$session, $setter], true)) {
                $session->$setter(self::refineValue($key, $value));
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

        // Convert date based properties

        if (\in_array($property, self::$dateProperties)) {
            $refinedValue = new \DateTimeImmutable($value);
        }

        return $refinedValue;
    }

    public function accessRefineValue(string $prop, $val)
    {
        return $this->refineValue($prop, $val);
    }

    public function accessDateProperties()
    {
        return self::$dateProperties;
    }
}