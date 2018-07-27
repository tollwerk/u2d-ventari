<?php

namespace Tollwerk\Ventari\Domain\Model;

/**
 * Class Event
 * @package Tollwerk\Ventari\Domain\Model
 */
class Event
{
    /**
     * Event Id
     * @var Integer
     */
    protected $eventId;

    /**
     * Event Name
     * @var String
     */
    protected $eventName;

    /**
     * Event Start Date
     * @var String
     * TODO: Update Date Variable Type - Should be 'date object'
     */
    protected $eventDate;

    /**
     * Event FE Link
     * @var String
     * TODO: Update FE link Variable Type - Should be 'link string'
     */
    protected $eventLink;

    /**
     * [GET] Function
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    public function getEventName()
    {
        return $this->eventName;
    }

    public function getEventDate()
    {
        return $this->eventDate;
    }

    public function getEventLink()
    {
        return $this->eventLink;
    }

    /**
     * [SET] Function
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
        return $this;
    }

    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
        return $this;
    }

    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
        return $this;
    }

    public function setEventLink($eventLink)
    {
        $this->eventLink = $eventLink;
        return $this;
    }


}
