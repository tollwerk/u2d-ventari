<?php

namespace Tollwerk\Ventari\Domain\Contract;

/**
 * Model Interface
 *
 * @package Tollwerk\Ventari\Domain\Contract
 */
interface ModelInterface
{
    /**
     * @return int
     */
    public function getVentariId(): int;

    /**
     * @param integer $id
     *
     * @return $this
     */
    public function setVentariId(int $id): void;

    /**
     * @return bool
     */
    public function isHidden(): bool ;

    /**
     * @param bool $active
     */
    public function setHidden(bool $active): void;
}