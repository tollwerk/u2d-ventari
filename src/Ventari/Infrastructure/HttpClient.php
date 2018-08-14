<?php

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;

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
        $this->authentication = $authentication;
    }

    /**
     * Dispatch Request
     *
     * @param string $request
     * @param array $params
     *
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function dispatchRequest(string $request, array $params): \stdClass
    {
        /** FOR DEV PURPOSED ONLY */
//        $fixtureJson    = 'http://localhost/~philipsaa/tollwerk/u2d-ventari/Public/fixture/'.ucfirst($request).'.json';
        $res            = null;
        $query          = '?'.http_build_query($params);
        $authentication = ['auth' => [$this->authentication['username'], $this->authentication['password']]];

        try {
            $res = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/'.$query, $authentication);
//            $res = $this->guzzle->request('GET', $fixtureJson);
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        $body = $res->getBody();

        return json_decode((string)$body)->responseData;

    }

}
