<?php

namespace Tollwerk\Ventari\Application\Factory;


use Tollwerk\Ventari\Application\Contract\FactoryInterface;
use Tollwerk\Ventari\Domain\Contract\ModelInterface;

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
        'personId'            => 'personId',
        'rowNum'              => 'rowNum',
        'parentParticipantId' => 'parentParticipantId',
        'createDate'          => 'createDate',
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

    }

}