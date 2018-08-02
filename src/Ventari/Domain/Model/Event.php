<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\EventInterface;

/**
 * Class Event
 * @package Tollwerk\Ventari\Domain\Model
 */
class Event extends AbstractModel implements EventInterface
{
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
    protected $eventContactEmail;

    /**
     * @var string
     */
    protected $eventContactFacebook;

    /**
     * @var string
     */
    protected $eventContactInstagram;

    /**
     * @var string
     */
    protected $eventContactLinks;

    /**
     * @var string
     */
    protected $eventContactLogo;

    /**
     * @var string
     */
    protected $eventContactName;

    /**
     * @var string
     */
    protected $eventContactTwitterHandle;

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
     * @var \DateTimeImmutable
     */
    protected $eventStartDate;

    /**
     * @var \DateTimeImmutable
     */
    protected $eventStartTime;

    /**
     * @var \DateTimeImmutable
     */
    protected $eventEndDate;

    /**
     * @var \DateTimeImmutable
     */
    protected $eventEndTime;

    /**
     * @var string
     */
    protected $eventFacebookEvent;

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
    protected $eventLivestreamCode;

    /**
     * @var string
     */
    protected $eventLivestream;

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
    protected $eventTicketUrl;

    /**
     * @var string
     */
    protected $eventTracks;

    /**
     * @var string
     */
    protected $eventTwitterHandle;

    /**
     * @var string
     */
    protected $eventTyp;

    /**
     * @var string
     */
    protected $eventWebsite;

    /**
     * @var string
     */
    protected $eventXingEvent;

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
    public function getEventContactEmail(): string
    {
        return $this->eventContactEmail;
    }

    /**
     * @param string $eventContactEmail
     */
    public function setEventContactEmail(string $eventContactEmail): void
    {
        $this->eventContactEmail = $eventContactEmail;
    }

    /**
     * @return string
     */
    public function getEventContactFacebook(): string
    {
        return $this->eventContactFacebook;
    }

    /**
     * @param string $eventContactFacebook
     */
    public function setEventContactFacebook(string $eventContactFacebook): void
    {
        $this->eventContactFacebook = $eventContactFacebook;
    }

    /**
     * @return string
     */
    public function getEventContactInstagram(): string
    {
        return $this->eventContactInstagram;
    }

    /**
     * @param string $eventContactInstagram
     */
    public function setEventContactInstagram(string $eventContactInstagram): void
    {
        $this->eventContactInstagram = $eventContactInstagram;
    }

    /**
     * @return string
     */
    public function getEventContactLinks(): string
    {
        return $this->eventContactLinks;
    }

    /**
     * @param string $eventContactLinks
     */
    public function setEventContactLinks(string $eventContactLinks): void
    {
        $this->eventContactLinks = $eventContactLinks;
    }

    /**
     * @return string
     */
    public function getEventContactLogo(): string
    {
        return $this->eventContactLogo;
    }

    /**
     * @param string $eventContactLogo
     */
    public function setEventContactLogo(string $eventContactLogo): void
    {
        $this->eventContactLogo = $eventContactLogo;
    }

    /**
     * @return string
     */
    public function getEventContactName(): string
    {
        return $this->eventContactName;
    }

    /**
     * @param string $eventContactName
     */
    public function setEventContactName(string $eventContactName): void
    {
        $this->eventContactName = $eventContactName;
    }

    /**
     * @return string
     */
    public function getEventContactTwitterHandle(): string
    {
        return $this->eventContactTwitterHandle;
    }

    /**
     * @param string $eventContactTwitterHandle
     */
    public function setEventContactTwitterHandle(string $eventContactTwitterHandle): void
    {
        $this->eventContactTwitterHandle = $eventContactTwitterHandle;
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
     * @return \DateTimeImmutable
     */
    public function getEventStartDate(): \DateTimeImmutable
    {
        return $this->eventStartDate;
    }

    /**
     * @param \DateTimeImmutable $eventStartDate
     */
    public function setEventStartDate(\DateTimeImmutable $eventStartDate): void
    {
        $this->eventStartDate = $eventStartDate;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getEventStartTime(): \DateTimeImmutable
    {
        return $this->eventStartTime;
    }

    /**
     * @param \DateTimeImmutable $eventStartTime
     */
    public function setEventStartTime(\DateTimeImmutable $eventStartTime): void
    {
        $this->eventStartTime = $eventStartTime;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getEventEndDate(): \DateTimeImmutable
    {
        return $this->eventEndDate;
    }

    /**
     * @param \DateTimeImmutable $eventEndDate
     */
    public function setEventEndDate(\DateTimeImmutable $eventEndDate): void
    {
        $this->eventEndDate = $eventEndDate;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getEventEndTime(): \DateTimeImmutable
    {
        return $this->eventEndTime;
    }

    /**
     * @param \DateTimeImmutable $eventEndTime
     */
    public function setEventEndTime(\DateTimeImmutable $eventEndTime): void
    {
        $this->eventEndTime = $eventEndTime;
    }

    /**
     * @return string
     */
    public function getEventFacebookEvent(): string
    {
        return $this->eventFacebookEvent;
    }

    /**
     * @param string $eventFacebookEvent
     */
    public function setEventFacebookEvent(string $eventFacebookEvent): void
    {
        $this->eventFacebookEvent = $eventFacebookEvent;
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
    public function getEventLivestreamCode(): string
    {
        return $this->eventLivestreamCode;
    }

    /**
     * @param string $eventLivestreamCode
     */
    public function setEventLivestreamCode(string $eventLivestreamCode): void
    {
        $this->eventLivestreamCode = $eventLivestreamCode;
    }

    /**
     * @return string
     */
    public function getEventLivestream(): string
    {
        return $this->eventLivestream;
    }

    /**
     * @param string $eventLivestream
     */
    public function setEventLivestream(string $eventLivestream): void
    {
        $this->eventLivestream = $eventLivestream;
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
    public function getEventTicketUrl(): string
    {
        return $this->eventTicketUrl;
    }

    /**
     * @param string $eventTicketUrl
     */
    public function setEventTicketUrl(string $eventTicketUrl): void
    {
        $this->eventTicketUrl = $eventTicketUrl;
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
    public function getEventTwitterHandle(): string
    {
        return $this->eventTwitterHandle;
    }

    /**
     * @param string $eventTwitterHandle
     */
    public function setEventTwitterHandle(string $eventTwitterHandle): void
    {
        $this->eventTwitterHandle = $eventTwitterHandle;
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
    public function getEventWebsite(): string
    {
        return $this->eventWebsite;
    }

    /**
     * @param string $eventWebsite
     */
    public function setEventWebsite(string $eventWebsite): void
    {
        $this->eventWebsite = $eventWebsite;
    }

    /**
     * @return string
     */
    public function getEventXingEvent(): string
    {
        return $this->eventXingEvent;
    }

    /**
     * @param string $eventXingEvent
     */
    public function setEventXingEvent(string $eventXingEvent): void
    {
        $this->eventXingEvent = $eventXingEvent;
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


}
