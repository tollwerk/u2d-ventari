<?php

namespace Tollwerk\Ventari\Infrastructure;


/**
 * Class AbstractPort
 * @package Tollwerk\Ventari\Infrastructure
 */
class AbstractPort
{
    /**
     * HTTP client
     *
     * @var HttpClient $client
     */
    protected $client;

    /**
     * Dispatcher
     *
     * @var DispatchController $dispatcher
     */
    protected $dispatcher;

    /**
     * Client constructor
     *
     * @param string $method        Request method
     * @param string $api           API URL
     * @param array $authentication Authentication credentials
     */
    public function __construct(string $method, string $api, array $authentication)
    {
        $this->client     = new HttpClient($method, $api, $authentication);
        $this->dispatcher = new DispatchController();
    }

    /**
     * Make an API request
     *
     * @param string $function API function
     * @param array $params    Request parameters
     *
     * @return array Response
     */
    protected function makeRequest(string $function, array $params): array
    {
        $clientResponse = $this->client->dispatchRequest($function, $params);
        $function       = str_replace('views/', '', $function);

        return $this->dispatcher->dispatch($function, $clientResponse);
    }

    /**
     * Request a file
     *
     * @param string $id File ID
     *
     * @return array|null File
     */
    protected function requestFile(string $id): ?array
    {
        $files = $this->client->dispatchRequest('files/'.$id, [])->files;
        if (count($files)) {
            return (array)array_shift($files);
        }

        return null;
    }

    public function requestPhoto(string $id): ?array
    {
        $files = $this->client->dispatchRequest('participants/'.$id.'/uploads/2026/', []);
        return (array)$files;
    }

    public function accessMakeRequest($arg1, $arg2): array
    {
        return $this->makeRequest($arg1, $arg2);
    }
}