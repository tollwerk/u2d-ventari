<?php

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;

class HttpClient implements HttpClientInterface
{
    /**
     * Guzzle Client
     *
     * @var ClientInterface
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

    /**
     * Public Function to access guzzle attribute; For Testing Purposes Only
     * @return Client|ClientInterface
     */
    public function getGuzzle()
    {
        return $this->guzzle;
    }

}
