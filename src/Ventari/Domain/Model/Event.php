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
     * Event name
     *
     * @var string
     */
    protected $eventName;

    /**
     * Event date
     *
     * @var \DateTimeInterface
     */
    protected $eventDate;

    /**
     * Event link
     *
     * @var string
     */
    protected $eventLink;

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
     * @return \DateTimeInterface
     */
    public function getEventDate(): \DateTimeInterface
    {
        return $this->eventDate;
    }

    /**
     * @param \DateTimeInterface $eventDate
     */
    public function setEventDate(\DateTimeInterface $eventDate): void
    {
        $this->eventDate = $eventDate;
    }

    /**
     * @return string
     */
    public function getEventLink(): string
    {
        return $this->eventLink;
    }

    /**
     * @param string $eventLink
     */
    public function setEventLink(string $eventLink): void
    {
        $this->eventLink = $eventLink;
    }

}
