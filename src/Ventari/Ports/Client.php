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

        $configFile         = self::$rootDirectory.'config'.DIRECTORY_SEPARATOR."rest-config.xml";
        $configFileContents = file_get_contents($configFile);
        self::$restConfig   = simplexml_load_string($configFileContents);

    }

    public function makeRequest(string $function, array $params)
    {
        echo 'Initializing your Request: <br><br>';

        echo 'Requesting the JSON Object<br>';
        $httpClient = new HttpClient();
        $httpClientResponse = $httpClient->dispatchRequest(self::$restConfig->method, self::$restConfig->domain);
//        var_dump($httpClientResponse); // TODO: remove;
        echo '<br><br>';

        echo 'Dispatching your JSON Ingestion<br>';
        $dispatcher = new DispatchController();
        $dispatchResponse = $dispatcher($httpClientResponse->responseData);

        echo '<br><br>';

        print_r($dispatchResponse);

        echo '<br><br>';

    }

}