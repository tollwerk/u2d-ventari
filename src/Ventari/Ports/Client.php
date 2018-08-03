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
     * Configuration Object
     * @var mixed
     */
    protected static $restConfig;

    public function __construct()
    {
        $rootDirectory      = \dirname(__DIR__, 3).DIRECTORY_SEPARATOR;
        $configFile         = $rootDirectory.'config'.DIRECTORY_SEPARATOR."rest-config.xml";
        $configFileContents = file_get_contents($configFile);
        self::$restConfig   = simplexml_load_string($configFileContents);
    }

    /**
     * @param $function
     * @param $params
     *
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function makeRequest($function, $params)
    {
        $method   = self::$restConfig->method->__toString();
        $protocal = self::$restConfig->protocol->__toString();
        $baseUri  = self::$restConfig->domain->__toString();
        $basePath = self::$restConfig->path->__toString();

        $baseUrl = $protocal.'://'.$baseUri.'/'.$basePath;

        $httpClient     = new HttpClient($method, $baseUrl);
        $clientResponse = $httpClient->dispatchRequest($function, $params);

        $dispatcher       = new DispatchController();
        $dispatchResponse = $dispatcher($clientResponse);

        return $dispatchResponse;
    }
}
