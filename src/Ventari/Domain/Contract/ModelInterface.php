<?php
/**
 * Created by PhpStorm.
 * User: philipsaa
 * Date: 8/6/18
 * Time: 17:01
 */

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
    public function getId(): int;

    /**
     * @param integer $id
     *
     * @return $this
     */
    public function setId($id): ModelInterface;

    /**
     * @return bool
     */
    public function isActive(): bool ;

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void;
}