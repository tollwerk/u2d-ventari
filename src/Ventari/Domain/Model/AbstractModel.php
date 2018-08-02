<?php

namespace Tollwerk\Ventari\Domain\Model;

/**
 * Class AbstractModel
 * @package Tollwerk\Ventari\Domain\Entity
 */
abstract class AbstractModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

}
