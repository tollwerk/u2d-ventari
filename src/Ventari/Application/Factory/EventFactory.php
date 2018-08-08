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
    const FUNCTION_NAME = e;

    /**
     * Date based properties
     * @var string[]
     */
    protected static $dateProperties = [
        'event_endtime',
        'event_end_date',
        'event_start_time',
        'event_start_date',
    ];

    protected static $eventApi = [
        'id'                           => 'ventariId',
        'active'                       => 'hidden',
        'event_category'               => 'ventariCategories', // We need a mapping to local TYPO3 sys_categories
        'event_chargeable'             => 'chargeable',
        'event_city'                   => 'locality',
        'event_contact_email'          => 'organizerEmail',
        'event_contact_facebook'       => 'organizerFacebook',
        'event_contact_instagram'      => 'organizerInstagram',
        'event_contact_links'          => 'organizerWebsite',
        'event_contact_logo'           => 'organizerLogo',
        'event_contact_name'           => 'organizerName',
        'event_contact_twitter_handle' => 'organizerTwitter',
        'event_cost'                   => 'ticketPrice',
        'event_cost_description'       => 'ticketDescription',
        'event_description'            => 'summary',
        'event_description_long'       => 'description',
        'event_end_date'               => 'endDateTime', // We need to combine this with event_endtime!
        'event_endtime'                => 'endDateTime', // We need to combine this with event_end_date!
        'event_facebook_event'         => 'facebookEvent',
//        'event_id'                     => 'id', <-- Skip this, it's redundant with id
        'event_image'                  => 'image',
        'event_level'                  => 'level',
        'event_livestream'             => 'livestream',
        'event_livestream_code'        => 'livestreamEmbed',
        'event_max_participants'       => 'maxParticipants',
        'event_name'                   => 'name',
        'event_other_tags'             => 'tags',
        'event_presentation_language'  => 'presentationLanguage',
        'event_start_date'             => 'startDateTime', // We need to combine this with event_start_time!
        'event_start_time'             => 'startDateTime', // We need to combine this with event_start_date!
        'event_status'                 => 'status',
        'event_targetgroup'            => 'targetgroup',
        'event_ticket_url'             => 'ticketUrl',
        'event_tracks'                 => 'tracks',
        'event_twitter_handle'         => 'twitter',
//        'event_typ'                    => 'type', // Not necessary
        'event_website'                => 'website',
        'event_xing_event'             => 'xingEvent',
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
            $setter = 'set'.self::$eventApi[$key];
            if (\is_callable([$event, $setter], true)) {
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
