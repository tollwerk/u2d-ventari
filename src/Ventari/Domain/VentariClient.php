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

    public function getPersonal()
    {
        // Return Something
    }

    public function doSomething()
    {
        // Do Something
    }

    public function doSomethingWithValue($value)
    {
        // Return Modified Array
        return array('foo' => $value);
    }
}
