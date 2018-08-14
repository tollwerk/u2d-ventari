<?php

namespace Tollwerk\Ventari\Application\Factory;


use Tollwerk\Ventari\Application\Contract\FactoryInterface;
use Tollwerk\Ventari\Domain\Contract\ModelInterface;
use Tollwerk\Ventari\Domain\Model\Speaker;

/**
 * Speaker Factory
 *
 * @package Tollwerk\Ventari\Application\Factory
 */
class SpeakerFactory implements FactoryInterface
{
    /**
     * Function name
     * @var string
     */
    const FUNCTION_NAME = 'Speaker';

    protected static $speakerApi = [
        // AbstractModel
        'speakerId'  => 'ventariId',

        // CommonInteger Traits
        'eventId'    => 'eventVentariId',

        // Speaker Model
        'company'    => 'organization',
        'email'      => 'email',
        'firstname'  => 'givenName',
        'lastname'   => 'familyName',
        'photo'      => 'photo',
        'position'   => 'role',
        'remark'     => 'description',
        'salutation' => 'gender',
        'title'      => 'title',
    ];

    /**
     * Create a Speaker from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return ModelInterface
     * @throws \Exception
     */
    public static function createFromJson($json): ModelInterface
    {
        $speaker = new Speaker();
//        if (!empty($json->fields) && \is_array($json->fields)) {
//            foreach ($json->fields as $field) {
//                $json[$field->token] = $field->value;
//            }
//        }

        foreach ($json as $key => $value) {
            if (!empty(self::$speakerApi[$key])) {
                $setter = 'set'.ucfirst(self::$speakerApi[$key]);
                if (\is_callable([$speaker, $setter], true)) {
                    $speaker->$setter(self::refineValue($key, $value));
                }
            }
        }

        return $speaker;
    }

    /**
     * Refine a value based on its property
     *
     * @param string $property Property name
     * @param string $value Property value
     *
     * @return mixed Refined property value
     */
    protected static function refineValue(string $property, $value)
    {
        $refinedValue = $value;

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