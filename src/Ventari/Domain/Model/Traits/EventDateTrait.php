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
    protected $startDateTime;

    /**
     * @var \DateTimeImmutable
     */
    protected $endDateTime;

    /**
     * @return \DateTimeImmutable
     */
    public function getStartDateTime(): \DateTimeImmutable
    {
        return $this->startDateTime;
    }

    /**
     * @param \DateTimeImmutable $startDateTime
     */
    public function setStartDateTime(\DateTimeImmutable $startDateTime): void
    {
        $this->startDateTime = $startDateTime;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getEndDateTime(): \DateTimeImmutable
    {
        return $this->endDateTime;
    }

    /**
     * @param \DateTimeImmutable $endDateTime
     */
    public function setEndDateTime(\DateTimeImmutable $endDateTime): void
    {
        $this->endDateTime = $endDateTime;
    }

    abstract public function abstractMethodForDate(): \DateTimeImmutable;
}
