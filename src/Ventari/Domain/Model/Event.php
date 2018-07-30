<?php

namespace Tollwerk\Ventari\Domain\Model;

/**
 * Class Event
 * @package Tollwerk\Ventari\Domain\Model
 */
class Event extends AbstractModel
{
    /**
     * @var integer
     */
    protected $eventId;

    /**
     * @var string
     */
    protected $eventName;

    /**
     * @var string
     * TODO: Update Date Variable Type - Should be 'date object'
     */
    protected $eventDate;

    /**
     * @var string
     * TODO: Update FE link Variable Type - Should be 'link string'
     */
    protected $eventLink;


    /***************************************************************
     * GET Functions
     **************************************************************/
    /**
     * @return int
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @return string
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * @return string
     */
    public function getEventLink()
    {
        return $this->eventLink;
    }

    /***************************************************************
     * SET Functions
     **************************************************************/

    /**
     * @param $eventId
     * @return $this
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
        return $this;
    }

    /**
     * @param $eventName
     * @return $this
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
        return $this;
    }

    /**
     * @param $eventDate
     * @return $this
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
        return $this;
    }

    /**
     * @param $eventLink
     * @return $this
     */
    public function setEventLink($eventLink)
    {
        $this->eventLink = $eventLink;
        return $this;
    }
}
