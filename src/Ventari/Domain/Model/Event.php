<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\EventInterface;
use Tollwerk\Ventari\Domain\Model\Traits\EventContactTrait;
use Tollwerk\Ventari\Domain\Model\Traits\EventDateTrait;
use Tollwerk\Ventari\Domain\Model\Traits\EventResourcesTrait;

/**
 * Class Event
 * @package Tollwerk\Ventari\Domain\Model
 */
class Event extends AbstractModel implements EventInterface
{
    /**
     * Use traits
     */
    use EventContactTrait, EventDateTrait, EventResourcesTrait;

    /**
     * @var string
     */
    protected $eventCategory;

    /**
     * @var string
     */
    protected $eventChargeable;

    /**
     * @var string
     */
    protected $eventCity;

    /**
     * @var string
     */
    protected $eventCostDescription;

    /**
     * @var string
     */
    protected $eventCost;

    /**
     * @var string
     */
    protected $eventDescriptionLong;

    /**
     * @var string
     */
    protected $eventDescription;

    /**
     * @var string
     */
    protected $eventImage;

    /**
     * @var string
     */
    protected $eventLevel;


    /**
     * @var string
     */
    protected $eventMaxParticipants;

    /**
     * @var string
     */
    protected $eventName;

    /**
     * @var string
     */
    protected $eventOtherTags;

    /**
     * @var string
     */
    protected $eventPresentationLanguage;

    /**
     * @var string
     */
    protected $eventStatus;

    /**
     * @var string
     */
    protected $eventTargetGroup;

    /**
     * @var string
     */
    protected $eventTracks;

    /**
     * @var string
     */
    protected $eventTyp;

    /**
     * @var string
     */
    protected $eventFrontendLink;

}
