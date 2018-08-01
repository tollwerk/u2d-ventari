<?php

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
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
     * HttpClient constructor
     *
     * @var string $method
     * @var string $baseUrl
     */
    public function __construct($method, $baseUrl)
    {
        $this->guzzle  = new Client(['base_uri' => $baseUrl]);
        $this->method  = $method;
        $this->baseUrl = $baseUrl;
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
    public function dispatchRequest(string $request, array $params)
    {
        $rootDirectory = dirname(__DIR__);
        $fixtureJson       = 'Tests'.DIRECTORY_SEPARATOR.'Fixture'.DIRECTORY_SEPARATOR.'Events.json';

//        $query = http_build_query($params, '', '&amp;');
//        try {
//            $res = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/'.'?'.$query);
//
//        } catch (RequestException $e) {
//            echo Psr7\str($e->getRequest());
//            if ($e->hasResponse()) {
//                echo Psr7\str($e->getResponse());
//            }
//        }

//        return $res->getBody();
        $devJson = file_get_contents($rootDirectory.DIRECTORY_SEPARATOR.$fixtureJson);

        return json_decode($devJson);
    }
}
