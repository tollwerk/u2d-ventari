<?php

namespace Tollwerk\Ventari\Domain\Exception;

use Tollwerk\Ventari\Domain\Contract\VentariExceptionInterface;

/**
 * Class RuntimeException
 *
 * @package Tollwerk\Ventari\Domain\Exception
 */
class RuntimeException extends \RuntimeException implements VentariExceptionInterface
{
    /**
     * Undefined method
     * @var int
     */
    public const METHOD_UNDEFINED = 1234;

    /**
     * Undefined method
     * @var string
     */
    public const METHOD_UNDEFINED_STR = 'Undefined method "%s"';
}
