<?php

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
    protected static $dateProperties = [
        'event_endtime',
        'event_end_date',
        'event_start_time',
        'event_start_date',
    ];

    protected static $eventApi = [
        'id'                           => 'Id',
        'active'                       => 'Active',
        'event_category'               => 'EventCategory',
        'event_chargeable'             => 'EventChargeable',
        'event_city'                   => 'EventCity',
        'event_contact_email'          => 'EventContactEmail',
        'event_contact_facebook'       => 'EventContactFacebook',
        'event_contact_instagram'      => 'EventContactInstagram',
        'event_contact_links'          => 'EventContactLinks',
        'event_contact_logo'           => 'EventContactLogo',
        'event_contact_name'           => 'EventContactName',
        'event_contact_twitter_handle' => 'EventContactTwitterHandle',
        'event_cost'                   => 'EventCost',
        'event_cost_description'       => 'EventCostDescription',
        'event_description'            => 'EventDescription',
        'event_description_long'       => 'EventDescriptionLong',
        'event_end_date'               => 'EventEndDate',
        'event_endtime'                => 'EventEndtime',
        'event_facebook_event'         => 'EventFacebookEvent',
        'event_id'                     => 'Id',
        'event_image'                  => 'EventImage',
        'event_level'                  => 'EventLevel',
        'event_livestream'             => 'EventLivestream',
        'event_livestream_code'        => 'EventLivestreamCode',
        'event_max_participants'       => 'EventMaxParticipants',
        'event_name'                   => 'EventName',
        'event_other_tags'             => 'EventOtherTags',
        'event_presentation_language'  => 'EventPresentationLanguage',
        'event_start_date'             => 'EventStartDate',
        'event_start_time'             => 'EventStartTime',
        'event_status'                 => 'EventStatus',
        'event_targetgroup'            => 'EventTargetgroup',
        'event_ticket_url'             => 'EventTicketUrl',
        'event_tracks'                 => 'EventTracks',
        'event_twitter_handle'         => 'EventTwitterHandle',
        'event_typ'                    => 'EventTyp',
        'event_website'                => 'EventWebsite',
        'event_xing_event'             => 'EventXingEvent',
        'frontendLink'                 => 'EventFrontendLink',
    ];

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

//        foreach ($json as $key => $value) {
//        foreach (self::$eventApi as $key => $value) {
//            echo str_replace('_', '', ucwords($item, '_')).PHP_EOL;
//            echo self::$eventApi[$key].PHP_EOL;
//        }

        // Run through all JSON properties
        foreach ($json as $key => $value) {
            $setter = 'set'.self::$eventApi[$key];

            if (is_callable([$event, $setter], true)) {
//                echo PHP_EOL.$setter.' : '.gettype($value).PHP_EOL;
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
