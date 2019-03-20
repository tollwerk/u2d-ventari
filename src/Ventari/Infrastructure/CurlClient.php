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
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7;
use Tollwerk\Ventari\Domain\Contract\CurlClientInterface;
use Tollwerk\Ventari\Infrastructure\Helper\Helper;
use Tollwerk\Ventari\Infrastructure\Exception\RuntimeException;

/**
 * Curl Client
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure
 */
class CurlClient implements CurlClientInterface
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
     * Curl Client constructor.
     *
     * @param string $method
     * @param string $baseUrl
     * @param array $authentication
     */
    public function __construct(string $method, string $baseUrl, array $authentication)
    {
        $handler      = new CurlHandler();
        $stack        = HandlerStack::create($handler);
        $this->guzzle = new Client([
            'handler' => $stack
        ]);

        $this->method         = $method;
        $this->baseUrl        = $baseUrl;
        $this->authentication = [
            'auth' => [
                $authentication['username'],
                $authentication['password']
            ]
        ];
    }

    /**
     * Dispatch Curl Request
     *
     * @param string $request Request path
     * @param array $params   Request parameters
     *
     * @return \stdClass Response of dispatched request
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function dispatchRequest(string $request, array $params): \stdClass
    {
        $res   = null;
        $query = '?'.Helper::queryBuilder($params);

        try {
            $res  = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/'.$query, [
                'curl' => [
                    CURLOPT_USERPWD        => $this->authentication['auth'][0].':'.$this->authentication['auth'][1],
                    CURLOPT_TIMEOUT        => 30,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_RETURNTRANSFER => true
                ]
            ]);
            $body = $res->getBody();
        } catch (RequestException $exception) {
            throw new RuntimeException(
                RuntimeException::METHOD_CURLCLIENT_STR.' : '.$exception->getCode().
                PHP_EOL.Psr7\str($exception->getRequest()),
                RuntimeException::METHOD_CURLCLIENT
            );

        }

        try {
            $dispatchResponse = json_decode((string)$body)->responseData;
        } catch (\RuntimeException $exception) {
            throw new RuntimeException(
                RuntimeException::METHOD_CURLCLIENT_STR.' : '.
                $exception->getCode(),
                RuntimeException::METHOD_CURLCLIENT
            );
        }

        return $dispatchResponse;
    }

    /**
     * Dispatch Curl Submission
     *
     * @param string $request Request path
     * @param array $params   Request parameters
     *
     * @return \stdClass Response from dispatched submission
     */
    public function dispatchSubmission(string $request, array $params): \stdClass
    {
        $res = null;

        $requestData = json_encode($params);

        $process = curl_init($this->baseUrl.'/'.$request.'/');

        curl_setopt($process, CURLOPT_USERPWD, $this->authentication['auth'][0].':'.$this->authentication['auth'][1]);
        curl_setopt($process, CURLOPT_POST, 1);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestData);
        curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($process);
        $json   = json_decode($result);

        return $json->responseData;
    }
}
