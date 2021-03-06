<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure
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

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;
use Tollwerk\Ventari\Infrastructure\Exception\RuntimeException;

/**
 * Http Client
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure
 */
class HttpClient implements HttpClientInterface
{
    /**
     * Guzzle client
     *
     * @var \GuzzleHttp\Client $guzzle
     */
    protected $guzzle;

    /**
     * Guzzle client request method
     *
     * @var string
     */
    protected $method;

    /**
     * Guzzle client base url
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * Authentication array
     *
     * @var array
     */
    protected $authentication;

    /**
     * Http Client constructor.
     *
     * @param string $method
     * @param string $baseUrl
     * @param array $authentication
     */
    public function __construct(string $method, string $baseUrl, array $authentication)
    {
        $this->guzzle = new Client([
            'headers' => [
                'User-Agent' => 'Ventari WebService',
                'Accept'     => 'application/json',
            ],
            'auth'    => [
                $authentication['username'],
                $authentication['password']
            ],
            'verify'  => false, // Use in dev only
//            'debug' => false
        ]);

        $this->baseUrl = $baseUrl;
        $this->method  = $method;
    }

    /**
     * Dispatch Http Request
     *
     * @param string $request
     * @param array $params
     *
     * @return \stdClass
     */
    public function dispatchRequest(string $request, array $params): \stdClass
    {
        $res   = null;
        $query = '?'.http_build_query($params);

        /**
         * Attempt to make Request
         */
        try {
            $res  = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/'.$query);
            $body = $res->getBody();
        } catch (GuzzleException $exception) {
            throw new RuntimeException(
                RuntimeException::METHOD_HTTPCLIENT_STR.' : '.$exception->getCode().
                PHP_EOL.$exception->getMessage(),
                RuntimeException::METHOD_HTTPCLIENT
            );
        }

        /**
         * Prepare results for return
         */
        try {
            $dispatchResponse = json_decode((string)$body)->responseData;
        } catch (\Exception $exception) {
            throw new RuntimeException(
                RuntimeException::METHOD_HTTPCLIENT_STR.' : '.
                $exception->getCode(),
                RuntimeException::METHOD_HTTPCLIENT
            );
        }

        return $dispatchResponse;
    }
}
