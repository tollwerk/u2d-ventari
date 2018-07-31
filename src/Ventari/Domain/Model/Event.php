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
    protected $eventStart;

    /**
     * Event link
     *
     * @var string
     */
    protected $frontendLink;

    /**
     * Event id
     * @var int
     */
    protected $eventId;

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
    public function getEventStart(): \DateTimeInterface
    {
        return $this->eventStart;
    }

    /**
     * @param \DateTimeInterface $eventStart
     */
    public function setEventStart(\DateTimeInterface $eventStart): void
    {
        $this->eventStart = $eventStart;
    }

    /**
     * @return string
     */
    public function getFrontendLink(): string
    {
        return $this->frontendLink;
    }

    /**
     * @param string $frontendLink
     */
    public function setFrontendLink(string $frontendLink): void
    {
        $this->frontendLink = $frontendLink;
    }

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
    }

    /**
     * @param int $eventId
     */
    public function setEventId(int $eventId): void
    {
        $this->eventId = $eventId;
    }
}
