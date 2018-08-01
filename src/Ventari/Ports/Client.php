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
     * Root Directory
     * @var string
     */
    protected static $rootDirectory;

    /**
     * Configuration Object
     * @var mixed
     */
    protected static $restConfig;

    public function __construct()
    {
        self::$rootDirectory = dirname(dirname(dirname(__DIR__))).DIRECTORY_SEPARATOR;
        $configFile          = self::$rootDirectory.'config'.DIRECTORY_SEPARATOR."rest-config.xml";
        $configFileContents  = file_get_contents($configFile);
        self::$restConfig    = simplexml_load_string($configFileContents);
    }

    public function makeRequest($function, $params)
    {
        $method             = self::$restConfig->method->__toString();
        $baseUrl           = self::$restConfig->domain->__toString();
        $httpClient         = new HttpClient($method, $baseUrl);
        $httpClientResponse = $httpClient->dispatchRequest($function, $params);

        $dispatcher       = new DispatchController();
        $dispatchResponse = $dispatcher($httpClientResponse->responseData);

        return $dispatchResponse;
    }
}
