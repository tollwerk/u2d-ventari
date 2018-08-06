<?php
/**
 * Created by PhpStorm.
 * User: philipsaa
 * Date: 8/6/18
 * Time: 17:12
 */

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
     *
     * @var string
     */
    const METHOD_UNDEFINED_STR = 'Undefined method "%s"';
    /**
     * Undefined method
     *
     * @var int
     */
    const METHOD_UNDEFINED = 1234;
}