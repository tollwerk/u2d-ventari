<?php

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;

class HttpClient implements HttpClientInterface
{
    /**
     * Guzzle Client
     *
     * @var Client::class
     */
    protected $guzzle;

    /**
     * HttpClient constructor.
     *
     */
    public function __construct()
    {
        $this->guzzle = new Client();
    }

    public function dispatchRequest(string $method, string $domain)
    {
        /**
         * TODO: hook up the real REST Service
         */
//        $res = $this->guzzle->request($method, $domain);
//        return $res->getBody();

        $devJSON = file_get_contents(dirname(__DIR__).DIRECTORY_SEPARATOR.'Tests'.DIRECTORY_SEPARATOR.'Fixture'.DIRECTORY_SEPARATOR.'Events.json');
        return json_decode($devJSON);
    }
}
