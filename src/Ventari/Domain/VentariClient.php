<?php

namespace Tollwerk\Ventari\Domain;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;

class VentariClient
{
    /**
     * Controller interface
     *
     * @var ControllerInterface
     */
    protected $config;

    /**
     * HTTP client
     *
     * @var HttpClientInterface
     */
    protected $client;

    public function __construct(ControllerInterface $config, HttpClientInterface $client)
    {
        $this->config = $config;
        $this->client = $client;
    }
}
