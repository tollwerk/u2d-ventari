<?php

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;

class HttpClient implements HttpClientInterface
{
    /**
     * Guzzle Client
     *
     * @var \GuzzleHttp\Client $guzzle
     */
    protected $guzzle;

    /**
     * Guzzle Client's Request Method
     * @var string
     */
    protected $method;

    /**
     * Guzzle Client's REST URL
     * @var string
     */
    protected $baseUrl;

    /**
     * Authentication Object
     * @var mixed
     */
    protected static $authConfig;

    /**
     * HttpClient constructor
     *
     * @var string $method
     * @var string $baseUrl
     */
    public function __construct($method, $baseUrl)
    {

        $rootDirectory      = \dirname(__DIR__, 3).DIRECTORY_SEPARATOR;
        $authFile         = $rootDirectory.'config'.DIRECTORY_SEPARATOR."rest-authentication.xml";
        $authFileContents = file_get_contents($authFile);
        self::$authConfig   = simplexml_load_string($authFileContents);

        $this->guzzle  = new Client([
            'headers' => ['User-Agent' => 'Ventari WebService'],
        ]);

        $this->method  = $method;
        $this->baseUrl = $baseUrl;
    }

    /**
     * Dispatch Request
     *
     * @param string $request
     * @param array $params
     *
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function dispatchRequest(string $request, array $params)
    {
        $res = null;
        $query = '?'.http_build_query($params);
        $username = self::$authConfig->username->__toString();
        $password = self::$authConfig->password->__toString();
        $authentication = ['auth' => [$username, $password]];

        try {
            $res = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/'.$query, $authentication);
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        $body = $res->getBody();
        return json_decode((string) $body)->responseData;
//        $devJson = file_get_contents($rootDirectory.DIRECTORY_SEPARATOR.$fixtureJson);
//        return json_decode($devJson);
    }
}
