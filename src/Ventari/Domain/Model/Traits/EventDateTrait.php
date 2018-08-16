<?php

namespace Tollwerk\Ventari\Domain\Model\Traits;

/**
 * Trait EventDateTrait
 * @package Tollwerk\Ventari\Domain\Model\Traits
 */
trait EventDateTrait
{
    /**
     * @var \DateTime
     */
    protected $startDateTime;

    /**
     * @var \DateTime
     */
    protected $endDateTime;

    /**
     * Constructor
     */
    public function __construct()
    {
        $dateTimeZone = new \DateTimeZone('Europe/Berlin');
        $this->startDateTime = new \DateTime('@0');
        $this->startDateTime->setTimezone($dateTimeZone);
        $this->endDateTime   = new \DateTime('@0');
        $this->endDateTime->setTimezone($dateTimeZone);
    }

    /**
     * @return \DateTime
     */
    public function getStartDateTime(): \DateTime
    {
        return $this->startDateTime;
    }

    /**
     * Set the start date & time
     *
     * @param array $modifiers Modifiers
     */
    public function setStartDateTime(array $modifiers): void
    {
        $this->startDateTime->setDate(
            empty($modifiers['year']) ? $this->startDateTime->format('Y') : $modifiers['year'],
            empty($modifiers['month']) ? $this->startDateTime->format('n') : $modifiers['month'],
            empty($modifiers['day']) ? $this->startDateTime->format('j') : $modifiers['day']
        );
        $this->startDateTime->setTime(
            empty($modifiers['hour']) ? $this->startDateTime->format('G') : $modifiers['hour'],
            empty($modifiers['minute']) ? (int) ltrim($this->startDateTime->format('i'), '0') : $modifiers['minute']
        );
    }

    /**
     * @return \DateTime
     */
    public function getEndDateTime(): \DateTime
    {
        return $this->endDateTime;
    }

    /**
     * Set the start date & time
     *
     * @param array $modifiers Modifiers
     */
    public function setEndDateTime(array $modifiers): void
    {
        $this->endDateTime->setDate(
            empty($modifiers['year']) ? $this->endDateTime->format('Y') : $modifiers['year'],
            empty($modifiers['month']) ? $this->endDateTime->format('n') : $modifiers['month'],
            empty($modifiers['day']) ? $this->endDateTime->format('j') : $modifiers['day']
        );
        $this->endDateTime->setTime(
            empty($modifiers['hour']) ? $this->endDateTime->format('G') : $modifiers['hour'],
            empty($modifiers['minute']) ? intval(ltrim($this->endDateTime->format('i'), '0')) : $modifiers['minute']
        );
    }

//    abstract public function abstractMethodForDate(): \DateTime;
    abstract public function abstractMethodForDate(): void;
}
