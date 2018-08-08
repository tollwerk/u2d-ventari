<?php

namespace Tollwerk\Ventari\Infrastructure;


/**
 * Class AbstractPort
 * @package Tollwerk\Ventari\Infrastructure
 */
class AbstractPort
{
    /**
     * @var HttpClient $client
     */
    protected static $client;

    /**
     * @var DispatchController $dispatcher
     */
    protected static $dispatcher;

    /**
     * Client constructor.
     *
     * @param string $method
     * @param string $api
     * @param array $authentication
     */
    public function __construct(string $method, string $api, array $authentication)
    {
        self::$client     = new HttpClient($method, $api, $authentication);
        self::$dispatcher = new DispatchController();
    }

    protected function makeRequest($function, $params): array
    {
        $clientResponse = self::$client->dispatchRequest($function, $params);
        $function = str_replace('views/', '', $function);
        return self::$dispatcher->dispatch($function, $clientResponse);
    }

    public function accessMakeRequest($arg1, $arg2): mixed
    {
        return $this->makeRequest($arg1, $arg2);
    }
}