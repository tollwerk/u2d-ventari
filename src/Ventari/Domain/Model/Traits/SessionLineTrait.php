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
    protected $lineId = 0;

    /**
     * @var string
     */
    protected $lineName = '';

    /**
     * @return int
     */
    public function getLineId(): int
    {
        return $this->lineId;
    }

    /**
     * @param int $lineId
     */
    public function setLineId(int $lineId): void
    {
        $this->lineId = $lineId;
    }

    /**
     * @return string
     */
    public function getLineName(): string
    {
        return $this->lineName;
    }

    /**
     * @param string $lineName
     */
    public function setLineName(string $lineName): void
    {
        $this->lineName = $lineName;
    }

    abstract public function abstractMethod(): mixed;
}