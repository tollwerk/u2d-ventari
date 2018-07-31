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
        echo '<pre>';
        echo '1. Initializing your Request: <br><br>';

        echo '2. Requesting the JSON Object<br>';
        $httpClient = new HttpClient();
        $httpClientResponse = $httpClient->dispatchRequest(self::$restConfig->method, self::$restConfig->domain);
//        var_dump($httpClientResponse); // TODO: remove;
        echo '<br>';

        echo '3. Dispatching your JSON Ingestion<br>';
        echo '<blockquote><code>';
        $dispatcher = new DispatchController();
        $dispatchResponse = $dispatcher($httpClientResponse->responseData);
        print_r($dispatchResponse);
        echo '</code></blockquote>';

        echo '4. Returning Data In Our Entity form not as JSON<br>';
        echo '<table border="1"><small>';
        foreach($dispatchResponse as $event){
            echo '<tr>';
            echo '<td>EventId: '.$event->getEventId().'</td>';
            echo '<td>EventName: '.$event->getEventName().'</td>';
            echo '<td>Eventstart: ';
            var_dump($event->getEventstart());
            echo '</td>';
            echo '<td>frontendLink: '.$event->getFrontendLink().'</td>';
            echo '</tr>';
        }
        echo '</small></table>';

        echo '</pre>';
    }

}