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
     * @return \DateTime
     */
    public function getStartDateTime(): \DateTime
    {
        return $this->startDateTime;
    }

    /**
     * @param \DateTime $startDateTime
     */
    public function setStartDateTime(\DateTime $startDateTime): void
    {
        $this->startDateTime = $startDateTime;
    }

    /**
     * @return \DateTime
     */
    public function getEndDateTime(): \DateTime
    {
        return $this->endDateTime;
    }

    /**
     * @param \DateTime $endDateTime
     */
    public function setEndDateTime(\DateTime $endDateTime): void
    {
        $this->endDateTime = $endDateTime;
    }

    abstract public function abstractMethodForDate(): \DateTime;
}
