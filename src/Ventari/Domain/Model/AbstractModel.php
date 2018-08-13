<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\ModelInterface;

/**
 * Class AbstractModel
 * @package Tollwerk\Ventari\Domain\Entity
 */
abstract class AbstractModel implements ModelInterface
{
    /**
     * @var int
     */
    protected $ventariId = 0;

    /**
     * @var bool
     */
    protected $hidden = false;

    /**
     * @return int
     */
    public function getVentariId(): int
    {
        return $this->ventariId;
    }

    /**
     * @param int $ventariId
     */
    public function setVentariId(int $ventariId): void
    {
        $this->ventariId = $ventariId;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * @param bool $hidden
     */
    public function setHidden(bool $hidden): void
    {
        $this->hidden = $hidden;
    }
}
