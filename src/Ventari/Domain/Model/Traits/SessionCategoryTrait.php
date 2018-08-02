<?php

namespace Tollwerk\Ventari\Domain\Model\Traits;

/**
 * Trait SessionCategoryTrait
 * @package Tollwerk\Ventari\Domain\Model\Traits
 */
trait SessionCategoryTrait
{
    /**
     * @var string
     */
    protected $sessionCategoryColor;

    /**
     * @var int
     */
    protected $sessionCategoryId;

    /**
     * @var string
     */
    protected $sessionCategoryName;

    /**
     * @var string
     */
    protected $sessionSignposting;

    /**
     * @return string
     */
    public function getSessionCategoryColor(): string
    {
        return $this->sessionCategoryColor;
    }

    /**
     * @param string $sessionCategoryColor
     */
    public function setSessionCategoryColor(string $sessionCategoryColor): void
    {
        $this->sessionCategoryColor = $sessionCategoryColor;
    }

    /**
     * @return int
     */
    public function getSessionCategoryId(): int
    {
        return $this->sessionCategoryId;
    }

    /**
     * @param int $sessionCategoryId
     */
    public function setSessionCategoryId(int $sessionCategoryId): void
    {
        $this->sessionCategoryId = $sessionCategoryId;
    }

    /**
     * @return string
     */
    public function getSessionCategoryName(): string
    {
        return $this->sessionCategoryName;
    }

    /**
     * @param string $sessionCategoryName
     */
    public function setSessionCategoryName(string $sessionCategoryName): void
    {
        $this->sessionCategoryName = $sessionCategoryName;
    }

    /**
     * @return string
     */
    public function getSessionSignposting(): string
    {
        return $this->sessionSignposting;
    }

    /**
     * @param string $sessionSignposting
     */
    public function setSessionSignposting(string $sessionSignposting): void
    {
        $this->sessionSignposting = $sessionSignposting;
    }

    abstract public function abstractMethod(): mixed;
}