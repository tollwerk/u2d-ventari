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
        'id'                           => 'id',
        'active'                       => 'active',
        'event_category'               => 'eventCategory',
        'event_chargeable'             => 'eventChargeable',
        'event_city'                   => 'eventCity',
        'event_contact_email'          => 'eventContactEmail',
        'event_contact_facebook'       => 'eventContactFacebook',
        'event_contact_instagram'      => 'eventContactInstagram',
        'event_contact_links'          => 'eventContactLinks',
        'event_contact_logo'           => 'eventContactLogo',
        'event_contact_name'           => 'eventContactName',
        'event_contact_twitter_handle' => 'eventContactTwitterHandle',
        'event_cost'                   => 'eventCost',
        'event_cost_description'       => 'eventCostDescription',
        'event_description'            => 'eventDescription',
        'event_description_long'       => 'eventDescriptionLong',
        'event_end_date'               => 'eventEndDate',
        'event_endtime'                => 'eventEndtime',
        'event_facebook_event'         => 'eventFacebookEvent',
        'event_id'                     => 'id',
        'event_image'                  => 'eventImage',
        'event_level'                  => 'eventLevel',
        'event_livestream'             => 'eventLivestream',
        'event_livestream_code'        => 'eventLivestreamCode',
        'event_max_participants'       => 'eventMaxParticipants',
        'event_name'                   => 'eventName',
        'event_other_tags'             => 'eventOtherTags',
        'event_presentation_language'  => 'eventPresentationLanguage',
        'event_start_date'             => 'eventStartDate',
        'event_start_time'             => 'eventStartTime',
        'event_status'                 => 'eventStatus',
        'event_targetgroup'            => 'eventTargetgroup',
        'event_ticket_url'             => 'eventTicketUrl',
        'event_tracks'                 => 'eventTracks',
        'event_twitter_handle'         => 'eventTwitterHandle',
        'event_typ'                    => 'eventTyp',
        'event_website'                => 'eventWebsite',
        'event_xing_event'             => 'eventXingEvent',
        'frontendLink'                 => 'eventFrontendLink',
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
