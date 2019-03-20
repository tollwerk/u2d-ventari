<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure\Exception
 * @author     Philip Saa <philip@tollwerk.de> / @cowglow
 * @copyright  Copyright © 2019 Philip Saa <philip@tollwerk.de> / @cowglow
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

/***********************************************************************************
 *  The MIT License (MIT)
 *
 *  Copyright © 2019 Philip Saa <philip@tollwerk.de>
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"), to deal in
 *  the Software without restriction, including without limitation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ***********************************************************************************/

namespace Tollwerk\Ventari\Infrastructure\Exception;

/**
 * Runtime Exception
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure\Exception
 */
class RuntimeException extends \Tollwerk\Ventari\Application\Exception\RuntimeException
{
    /**
     * HttpClient method
     *
     * @var int
     */
    public const METHOD_HTTPCLIENT = 3002;

    /**
     * HttpClient method
     *
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
     *
     * @var string
     */
    public const METHOD_CURLCLIENT_STR = 'Ventari Request Failed via CurlClient';

    /**
     * GuzzleException
     *
     * @var int
     */
    public const DEPENDENCY_EXCEPTION = 9999;

    /**
     * GuzzleException
     *
     * @var string
     */
    public const DEPENDENCY_EXCEPTION_STR = 'Guzzle Exception Caught';

    /**
     * Person Id missing
     *
     * @var int
     */
    public const RESPONSE_PERSONID = 9998;

    /**
     * Person Id missing
     *
     * @var string
     */
    public const RESPONSE_PERSONID_STR = 'Missing Value: "%s"';


    /**
     * Participant Status Id
     *
     * @var int
     */
    public const METHOD_EVENTPARTICIPANTS = 4013;

    /**
     * Participant Status Id
     * @var string
     */
    public const METHOD_EVENTPARTICIPANTS_STR = 'Incorrect Status Id: "%s"';

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
