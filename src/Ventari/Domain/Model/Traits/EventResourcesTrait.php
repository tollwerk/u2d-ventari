<?php

namespace Tollwerk\Ventari\Domain\Model\Traits;

/**
 * Trait EventResourcesTrait
 * @package Tollwerk\Ventari\Domain\Model\Traits
 */
trait EventResourcesTrait
{
    /**
     * @var string
     */
    protected $eventFacebookEvent;

    /**
     * @var string
     */
    protected $eventTwitterHandle;

    /**
     * @var string
     */
    protected $eventXingEvent;

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
    protected $eventTicketUrl;

    /**
     * @var string
     */
    protected $eventWebsite;

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
}
