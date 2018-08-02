<?php

namespace Tollwerk\Ventari\Domain\Model;

/**
 * Class AbstractField
 * @package Tollwerk\Ventari\Domain\Model
 */
abstract class AbstractField
{
    /**
     * @var integer
     */
    protected $anzParamId;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $token;

    /**
     * @return int
     */
    public function getAnzParamId(): int
    {
        return $this->anzParamId;
    }

    /**
     * @param int $anzParamId
     */
    public function setAnzParamId(int $anzParamId): void
    {
        $this->anzParamId = $anzParamId;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }


}