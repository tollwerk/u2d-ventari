<?php

namespace Tollwerk\Ventari\Application\Factory;


use Tollwerk\Ventari\Application\Contract\FactoryInterface;
use Tollwerk\Ventari\Domain\Contract\ModelInterface;
use Tollwerk\Ventari\Domain\Model\Participant;

class ParticipantFactory implements FactoryInterface
{
    /**
     * Function name
     * @var string
     */
    const FUNCTION_NAME = 'Participant';

    protected static $participantApi = [
        // AbstractModel
        'id'       => 'ventariId',

        // Participant Model
        'personId' => 'personId',
        'email'    => 'email'
    ];

    protected static $intProperties = [
        'personId'
    ];

    protected static $fieldsProperties = [
        'fields'
    ];

    /**
     * Create a model instance from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return ModelInterface Model
     * @throws \Exception
     */
    public static function createFromJson($json): ModelInterface
    {
        $participant = new Participant();

        foreach ($json as $key => $value) {
            if (!empty(self::$participantApi[$key])) {
                $setter = 'set'.ucfirst(self::$participantApi[$key]);
                if (\is_callable([$participant, $setter], true)) {
                    $participant->$setter(self::refineValue($key, $value));
                }
            }

            if ($key === 'fields') {
                foreach ($value as $val) {
                    if ($val->anzParamId === 7) {
                        $setter       = 'setEmail';
                        $participant->$setter(self::refineValue('email', $val->value));
                    }
                }
            }
        }

        return $participant;
    }

    protected static function refineValue(string $property, $value)
    {
        $refinedValue = $value;

        if (\in_array($property, self::$intProperties, true)) {
            if (gettype($value) !== 'integer') {
                $refinedValue = 'Empty String';
            } else {
                $refinedValue = (int)$value;
            }
        }

        return $refinedValue;
    }

    public function accessRefineValue(string $prop, $val)
    {
        return $this->refineValue($prop, $val);
    }

    public function accessSpeakerApi(): array
    {
        return self::$speakerApi;
    }
}