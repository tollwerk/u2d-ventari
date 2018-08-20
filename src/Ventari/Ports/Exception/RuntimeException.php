<?php

namespace Tollwerk\Ventari\Ports\Exception;

use Throwable;

/**
 * Class RuntimeException
 *
 * @package Tollwerk\Ventari\Domain\Exception
 */
class RuntimeException extends \Tollwerk\Ventari\Infrastructure\Exception\RuntimeException
{
    /**
     * HttpClient method
     * @var int
     */
    public const METHOD_HTTPCLIENT = 3002;

    /**
     * HttpClient method
     * @var string
     */
    public const METHOD_HTTPCLIENT_STR = 'Ventari Request Failed via HttpClient';

    /**
     * CurlClient method
     * @var int
     */
    public const METHOD_CURLCLIENT = 3004;

    /**
     * CurlClient Method
     * @var string
     */
    public const METHOD_CURLCLIENT_STR = 'Ventari Request Failed via CurlClient';

    /**
     * GuzzleException
     * @var int
     */
    public const DEPENDENCY_EXCEPTION = 9999;

    /**
     * GuzzleException
     * @var string
     */
    public const DEPENDENCY_EXCEPTION_STR = 'Guzzle Exception Caught';

    public const RESPONSE_PERSONID = 9998;
    public const RESPONSE_PERSONID_STR = 'Missing Value: "%s"';

    /**
     * @var null|Throwable
     */
    private $previous;

    /**
     * RuntimeException constructor.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}