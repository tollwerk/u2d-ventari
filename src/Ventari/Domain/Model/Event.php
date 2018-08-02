<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\EventInterface;
use Tollwerk\Ventari\Domain\Model\Traits\EventContactTrait;
use Tollwerk\Ventari\Domain\Model\Traits\EventDateTrait;
use Tollwerk\Ventari\Domain\Model\Traits\EventLinkTrait;

/**
 * Class Event
 * @package Tollwerk\Ventari\Domain\Model
 */
class Event extends AbstractModel implements EventInterface
{
    /**
     * Use traits
     */
    use EventContactTrait, EventDateTrait, EventLinkTrait;

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

    /**
     * @return string
     */
    public function getEventCategory(): string
    {
        return $this->eventCategory;
    }

    /**
     * @param string $eventCategory
     */
    public function setEventCategory(string $eventCategory): void
    {
        $this->eventCategory = $eventCategory;
    }

    /**
     * @return string
     */
    public function getEventChargeable(): string
    {
        return $this->eventChargeable;
    }

    /**
     * @param string $eventChargeable
     */
    public function setEventChargeable(string $eventChargeable): void
    {
        $this->eventChargeable = $eventChargeable;
    }

    /**
     * @return string
     */
    public function getEventCity(): string
    {
        return $this->eventCity;
    }

    /**
     * @param string $eventCity
     */
    public function setEventCity(string $eventCity): void
    {
        $this->eventCity = $eventCity;
    }

    /**
     * @return string
     */
    public function getEventCostDescription(): string
    {
        return $this->eventCostDescription;
    }

    /**
     * @param string $eventCostDescription
     */
    public function setEventCostDescription(string $eventCostDescription): void
    {
        $this->eventCostDescription = $eventCostDescription;
    }

    /**
     * @return string
     */
    public function getEventCost(): string
    {
        return $this->eventCost;
    }

    /**
     * @param string $eventCost
     */
    public function setEventCost(string $eventCost): void
    {
        $this->eventCost = $eventCost;
    }

    /**
     * @return string
     */
    public function getEventDescriptionLong(): string
    {
        return $this->eventDescriptionLong;
    }

    /**
     * @param string $eventDescriptionLong
     */
    public function setEventDescriptionLong(string $eventDescriptionLong): void
    {
        $this->eventDescriptionLong = $eventDescriptionLong;
    }

    /**
     * @return string
     */
    public function getEventDescription(): string
    {
        return $this->eventDescription;
    }

    /**
     * @param string $eventDescription
     */
    public function setEventDescription(string $eventDescription): void
    {
        $this->eventDescription = $eventDescription;
    }

    /**
     * @return string
     */
    public function getEventImage(): string
    {
        return $this->eventImage;
    }

    /**
     * @param string $eventImage
     */
    public function setEventImage(string $eventImage): void
    {
        $this->eventImage = $eventImage;
    }

    /**
     * @return string
     */
    public function getEventLevel(): string
    {
        return $this->eventLevel;
    }

    /**
     * @param string $eventLevel
     */
    public function setEventLevel(string $eventLevel): void
    {
        $this->eventLevel = $eventLevel;
    }

    /**
     * @return string
     */
    public function getEventMaxParticipants(): string
    {
        return $this->eventMaxParticipants;
    }

    /**
     * @param string $eventMaxParticipants
     */
    public function setEventMaxParticipants(string $eventMaxParticipants): void
    {
        $this->eventMaxParticipants = $eventMaxParticipants;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->eventName;
    }

    /**
     * @param string $eventName
     */
    public function setEventName(string $eventName): void
    {
        $this->eventName = $eventName;
    }

    /**
     * @return string
     */
    public function getEventOtherTags(): string
    {
        return $this->eventOtherTags;
    }

    /**
     * @param string $eventOtherTags
     */
    public function setEventOtherTags(string $eventOtherTags): void
    {
        $this->eventOtherTags = $eventOtherTags;
    }

    /**
     * @return string
     */
    public function getEventPresentationLanguage(): string
    {
        return $this->eventPresentationLanguage;
    }

    /**
     * @param string $eventPresentationLanguage
     */
    public function setEventPresentationLanguage(string $eventPresentationLanguage): void
    {
        $this->eventPresentationLanguage = $eventPresentationLanguage;
    }

    /**
     * @return string
     */
    public function getEventStatus(): string
    {
        return $this->eventStatus;
    }

    /**
     * @param string $eventStatus
     */
    public function setEventStatus(string $eventStatus): void
    {
        $this->eventStatus = $eventStatus;
    }

    /**
     * @return string
     */
    public function getEventTargetGroup(): string
    {
        return $this->eventTargetGroup;
    }

    /**
     * @param string $eventTargetGroup
     */
    public function setEventTargetGroup(string $eventTargetGroup): void
    {
        $this->eventTargetGroup = $eventTargetGroup;
    }

    /**
     * @return string
     */
    public function getEventTracks(): string
    {
        return $this->eventTracks;
    }

    /**
     * @param string $eventTracks
     */
    public function setEventTracks(string $eventTracks): void
    {
        $this->eventTracks = $eventTracks;
    }

    /**
     * @return string
     */
    public function getEventTyp(): string
    {
        return $this->eventTyp;
    }

    /**
     * @param string $eventTyp
     */
    public function setEventTyp(string $eventTyp): void
    {
        $this->eventTyp = $eventTyp;
    }

    /**
     * @return string
     */
    public function getEventFrontendLink(): string
    {
        return $this->eventFrontendLink;
    }

    /**
     * @param string $eventFrontendLink
     */
    public function setEventFrontendLink(string $eventFrontendLink): void
    {
        $this->eventFrontendLink = $eventFrontendLink;
    }

    public function abstractMethod(): string
    {
        // TODO: Implement abstractMethod() method.
    }

    public function abstractMethodForDate(): \DateTimeImmutable
    {
        // TODO: Implement abstractMethodForDate() method.
    }
}
