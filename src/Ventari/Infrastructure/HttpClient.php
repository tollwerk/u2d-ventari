<?php

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;
use Tollwerk\Ventari\Ports\Exception\RuntimeException;

class HttpClient implements HttpClientInterface
{
    /**
     * Guzzle Client
     *
     * @var \GuzzleHttp\Client $guzzle
     */
    protected $guzzle;

    /**
     * Guzzle Client's Request Method
     * @var string
     */
    protected $method;

    /**
     * Guzzle Client's REST URL
     * @var string
     */
    protected $baseUrl;

    /**
     * Authentication Array
     * @var array
     */
    protected $authentication;

    /**
     * HttpClient constructor.
     *
     * @param string $method
     * @param string $baseUrl
     * @param array $authentication
     */
    public function __construct(string $method, string $baseUrl, array $authentication)
    {
        $this->guzzle = new Client([
            'headers' => ['User-Agent' => 'Ventari WebService'],
        ]);

        $this->method         = $method;
        $this->baseUrl        = $baseUrl;
        $this->authentication = ['auth' => [$authentication['username'], $authentication['password']]];
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
            $res  = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/'.$query,
                $this->authentication);
            $body = $res->getBody();
        } catch (RequestException $exception) {
            echo 'RequestException'.PHP_EOL;

            throw new RuntimeException(
                RuntimeException::METHOD_HTTPCLIENT_STR.' : '.$exception->getCode().
                PHP_EOL.Psr7\str($exception->getRequest()),
                RuntimeException::METHOD_HTTPCLIENT
            );

        }

        /**
         * Prepare results for return
         */
        try {
            $dispatchResponse = json_decode((string)$body)->responseData;
        } catch (\RuntimeException $exception) {
            echo '\RuntimeException'.PHP_EOL;

            throw new RuntimeException(
                RuntimeException::METHOD_HTTPCLIENT_STR.' : '.
                $exception->getCode(),
                RuntimeException::METHOD_HTTPCLIENT
            );
        }

        return $dispatchResponse;
    }
}
