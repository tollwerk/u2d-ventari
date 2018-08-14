<?php

namespace Tollwerk\Ventari\Application\Factory;


use Tollwerk\Ventari\Application\Contract\FactoryInterface;
use Tollwerk\Ventari\Domain\Contract\ModelInterface;
use Tollwerk\Ventari\Domain\Model\Participant;

/**
 * Participant Factory
 *
 * @package Tollwerk\Ventari\Application\Factory
 */
class ParticipantFactory implements FactoryInterface
{
    /**
     * Function name
     * @var string
     */
    const FUNCTION_NAME = 'Participant';

    protected static $participantApi = [
        'personId'            => 'personVentariId', // <-- We need this to associate this with an event
//        'rowNum'              => 'rowNum', // Not necessary
//        'parentParticipantId' => 'parentParticipantId', // <-- Necessary?
//        'createDate'          => 'createDate', // Not necessary
        'eventId'             => 'eventId',
        'hash'                => 'hash',
        'status'              => 'status',
        'groupId'             => 'groupId',
        'languageId'          => 'languageId',
        'lastModified'        => 'lastModified',
        'originId'            => 'originId',
        'id'                  => 'id',
        'createdBy'           => 'createdBy',
        'changedBy'           => 'changedBy',
    ];

    /**
     * Create a Participant from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return ModelInterface
     * @throws \Exception
     */
    public static function createFromJson($json): ModelInterface
    {
        $participant = new Participant();
        foreach ($json as $key => $value) {
            if (!empty(self::$participantApi[$key])) {
                $setter = 'set'.ucfirst(self::$participantApi[$key]);
                if (\is_callable([$participant, $setter], true)){
                    $participant->$setter(self::refineValue($key, $value));
                }
            }
        }

        return $participant;
    }

    protected static function refineValue(string $property, $value)
    {
        $refinedValue = $value;

        return $refinedValue;
    }
}