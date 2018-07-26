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


}