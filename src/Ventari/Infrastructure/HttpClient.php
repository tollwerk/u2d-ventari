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
}
