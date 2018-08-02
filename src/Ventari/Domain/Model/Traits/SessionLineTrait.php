<?php

namespace Tollwerk\Ventari\Domain\Model\Traits;

/**
 * Class SessionLineTrait
 * @package Tollwerk\Ventari\Domain\Model\Traits
 */
trait SessionLineTrait
{
    /**
     * @var int
     */
    protected $sessionLineId;

    /**
     * @var string
     */
    protected $sessionLineName;

    /**
     * @return int
     */
    public function getSessionLineId(): int
    {
        return $this->sessionLineId;
    }

    /**
     * @param int $sessionLineId
     */
    public function setSessionLineId(int $sessionLineId): void
    {
        $this->sessionLineId = $sessionLineId;
    }

    /**
     * @return string
     */
    public function getSessionLineName(): string
    {
        return $this->sessionLineName;
    }

    /**
     * @param string $sessionLineName
     */
    public function setSessionLineName(string $sessionLineName): void
    {
        $this->sessionLineName = $sessionLineName;
    }
}