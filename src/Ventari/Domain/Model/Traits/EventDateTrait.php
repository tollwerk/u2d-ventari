<?php

namespace Tollwerk\Ventari\Domain\Model\Traits;

/**
 * Trait EventDateTrait
 * @package Tollwerk\Ventari\Domain\Model\Traits
 */
trait EventDateTrait
{
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

    public function abstractMethod(): \DateTimeImmutable
    {
    }
}
