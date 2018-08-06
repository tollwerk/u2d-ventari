<?php

namespace Tollwerk\Ventari\Ports;

use Tollwerk\Ventari\Infrastructure\DispatchController;
use Tollwerk\Ventari\Infrastructure\HttpClient;

/**
 * Class Client
 * @package Tollwerk\Ventari\Ports
 */
class Client
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

    protected function makeRequest($function, $params)
    {
        $clientResponse   = self::$client->dispatchRequest($function, $params);
        $dispatchResponse = self::$dispatcher->dispatch($function, $clientResponse);

        return $dispatchResponse;
    }

    /**
     * @param array|null $params
     *
     * @return ControllerInterface
     */
    public function getEvents(array $params = null): ControllerInterface
    {
        $_params = (count($params) > 0) ? $params : [];

        return $this->makeRequest('Event', $_params);
    }

    /**
     * @param array|null $params
     *
     * @return ControllerInterface
     */
    public function getLocations(array $params = null): ControllerInterface
    {
        $_params = (count($params) > 0) ? $params : [];

        return $this->makeRequest('Location', $_params);
    }

    /**
     * @param array|null $params
     *
     * @return ControllerInterface
     */
    public function getSessions(array $params = null): ControllerInterface
    {
        $_params = (count($params) > 0) ? $params : [];

        return $this->makeRequest('Session', $_params);
    }
}
