<?php

namespace Tollwerk\Ventari\Domain;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;

class VentariClient
{
    /**
     * @var ControllerInterface
     */
    protected $config;

    /**
     * @var HttpClientInterface
     */
    protected $client;

    public function __construct(ControllerInterface $config, HttpClientInterface $client)
    {
        $this->config = $config;
        $this->client = $client;
    }


}
