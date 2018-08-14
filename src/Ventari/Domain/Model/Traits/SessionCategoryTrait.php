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
    protected $categoryColor = '';

    /**
     * @var int
     */
    protected $categoryId = 0;

    /**
     * @var string
     */
    protected $categoryName = '';

    /**
     * @return string
     */
    public function getCategoryColor(): string
    {
        return $this->categoryColor;
    }

    /**
     * @param string $categoryColor
     */
    public function setCategoryColor(string $categoryColor): void
    {
        $this->categoryColor = $categoryColor;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     */
    public function setCategoryName(string $categoryName): void
    {
        $this->categoryName = $categoryName;
    }

    abstract public function abstractMethod(): mixed;
}