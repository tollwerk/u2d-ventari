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
    protected $eventVentariId;

    /**
     * @return int
     */
    public function getEventVentariId(): int
    {
        return $this->eventVentariId;
    }

    /**
     * @param int $eventVentariId
     */
    public function setEventVentariId(int $eventVentariId): void
    {
        $this->eventVentariId = $eventVentariId;
    }

    abstract public function abstractMethod(): mixed;
}