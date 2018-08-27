<?php

namespace Tollwerk\Ventari\Application\Factory;

use Tollwerk\Ventari\Application\Contract\FactoryInterface;
use Tollwerk\Ventari\Domain\Contract\ModelInterface;
use Tollwerk\Ventari\Domain\Model\Event;

/**
 * Event Factory
 *
 * @package Tollwerk\Ventari\Application\Factory
 */
class EventFactory implements FactoryInterface
{
    /**
     * Function name
     * @var string
     */
    const FUNCTION_NAME = 'Event';

    /**
     * Date based properties
     * @var string[]
     */
    protected static $dateProperties = [
        'event_end_date',
        'event_start_date',
    ];

    /**
     * Time based properties
     * @var string[]
     */
    protected static $timeProperties = [
        'event_endtime',
        'event_start_time',
    ];

    protected static $intProperties = [
        'event_max_participants'
    ];

    protected static $invertProperties = [
        'active'
    ];

    protected static $arrayProperties = [
        'event_level',
        'event_presentation_language',
        'event_targetgroup',
        'event_category',
        'event_tracks'
    ];

    protected static $eventApi = [
        // AbstractModel
        'id'                           => 'ventariId',
        'active'                       => 'hidden',

        // EventContact Traits
        'event_contact_email'          => 'organizerEmail',
        'event_contact_facebook'       => 'organizerFacebook',
        'event_contact_instagram'      => 'organizerInstagram',
        'event_contact_other_links'    => 'organizerOtherLink', // <--
        'event_contact_website'        => 'organizerWebsite', // <--
        'event_contact_logo'           => 'organizerLogo',
        'event_contact_name'           => 'organizerName',
        'event_contact_twitter_handle' => 'organizerTwitter',

        // EventDate Traits
        'event_start_date'             => 'startDateTime', // We need to combine this with event_start_time!
        'event_start_time'             => 'startDateTime', // We need to combine this with event_start_date!
        'event_end_date'               => 'endDateTime', // We need to combine this with event_endtime!
        'event_endtime'                => 'endDateTime', // We need to combine this with event_end_date!

        //EventLink Traits
        'event_facebook_event'         => 'facebookEvent',
        'event_twitter_handle'         => 'twitter',
        'event_xing_event'             => 'xingEvent',
        'event_livestream_code'        => 'livestreamEmbed',
        'event_livestream'             => 'livestream',
        'event_ticket_url'             => 'ticketUrl',
        'event_website'                => 'website',

        // Event Model
        'event_category'               => 'ventariCategories', // We need a mapping to local TYPO3 sys_categories
        'event_chargeable'             => 'chargeable',
        'event_city'                   => 'locality',
        'event_cost_description'       => 'ticketDescription',
        'event_cost'                   => 'ticketPrice',
        'event_description_long'       => 'description',
        'event_description'            => 'summary',
        'event_image'                  => 'image',
        'event_level'                  => 'level',
        'event_max_participants'       => 'maxParticipants',
        'event_name'                   => 'name',
        'event_other_tags'             => 'tags',
        'event_presentation_language'  => 'presentationLanguage',
        'event_status'                 => 'status',
        'event_targetgroup'            => 'targetgroup',
        'event_tracks'                 => 'tracks',
        'frontendLink'                 => 'registration',
    ];

    /**
     * Create an event from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return ModelInterface Event
     * @throws \Exception
     */
    public static function createFromJson($json): ModelInterface
    {
        $event = new Event();
        foreach ($json as $key => $value) {
            if (!empty(self::$eventApi[$key])) {
                $setter = 'set'.ucfirst(self::$eventApi[$key]);
                if (\is_callable([$event, $setter], true)) {
                    $event->$setter(self::refineValue($key, $value));
                }
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

        if (\in_array($property, self::$dateProperties, true)) {
            $refinedValue = [];
            if ($value !== '') {
                list($refinedValue['year'], $refinedValue['month'], $refinedValue['day']) = explode('-', $value);
            }

        } elseif (\in_array($property, self::$timeProperties, true)) {
            $refinedValue = [];
            if ($value !== '') {
                list($refinedValue['hour'], $refinedValue['minute']) = explode(':', $value);
            }

        } elseif (\in_array($property, self::$intProperties, true)) {
            $refinedValue = (int)$value;

        } elseif (\in_array($property, self::$invertProperties, true)) {
            $refinedValue = !$value;

        } elseif (\in_array($property, self::$arrayProperties, true)) {
            $refinedValue = [];
            if ($value !== '') {
                $refinedValue = array_filter(explode(',', $value));
            }
        }

        return $refinedValue;
    }

    public function accessRefineValue(string $prop, $val)
    {
        return $this->refineValue($prop, $val);
    }

    public function accessDateProperties(): array
    {
        return self::$dateProperties;
    }

    public function accessEventApi(): array
    {
        return self::$eventApi;
    }
}
