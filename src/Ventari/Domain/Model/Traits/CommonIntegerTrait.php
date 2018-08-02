<?php

namespace Tollwerk\Ventari\Domain\Model\Traits;

/**
 * Trait CommonIntegerTrait
 * @package Tollwerk\Ventari\Domain\Model\Traits
 */
trait CommonIntegerTrait
{
    /**
     * @var int
     */
    protected $rowNum;

    /**
     * @var int
     */
    protected $eventId;

    /**
     * @return int
     */
    public function getRowNum(): int
    {
        return $this->rowNum;
    }

    /**
     * @param int $rowNum
     */
    public function setRowNum(int $rowNum): void
    {
        $this->rowNum = $rowNum;
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