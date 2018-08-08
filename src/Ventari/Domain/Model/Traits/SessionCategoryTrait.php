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
    protected $categoryColor;

    /**
     * @var int
     */
    protected $categoryId;

    /**
     * @var string
     */
    protected $categoryName;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}