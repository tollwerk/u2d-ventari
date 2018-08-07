<?php

namespace Tollwerk\Ventari\Infrastructure\Exception;

/**
 * Class RuntimeException
 *
 * @package Tollwerk\Ventari\Domain\Exception
 */
class RuntimeException extends \Tollwerk\Ventari\Application\Exception\RuntimeException
{
    /**
     * Undefined method
     * @var string
     */
    const METHOD_UNDEFINED_STR = 'Undefined method "%s"';

    /**
     * Undefined method
     * @var int
     */
    const METHOD_UNDEFINED = 1234;
}