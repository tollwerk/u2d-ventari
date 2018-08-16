<?php

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7;
use Tollwerk\Ventari\Domain\Contract\CurlClientInterface;
use Tollwerk\Ventari\Infrastructure\Helper\Helper;


/**
 * Class CurlClient
 * @package Tollwerk\Ventari\Infrastructure
 */
class CurlClient implements CurlClientInterface
{
    /**
     * Guzzle Client
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
     * Authentication Array
     * @var array
     */
    protected $authentication;

    /**
     * CurlClient constructor.
     *
     * @param string $method
     * @param string $baseUrl
     * @param array $authentication
     */
    public function __construct(string $method, string $baseUrl, array $authentication)
    {
        $handler      = new CurlHandler();
        $stack        = HandlerStack::create($handler);
        $this->guzzle = new Client([
            'handler' => $stack
        ]);

        $this->method         = $method;
        $this->baseUrl        = $baseUrl;
        $this->authentication = ['auth' => [$authentication['username'], $authentication['password']]];
    }

    /**
     * Dispatch Curl Request
     *
     * @param string $request
     * @param array $params
     *
     * @return \stdClass
     */
    public function dispatchRequest(string $request, array $params): \stdClass
    {
        // TODO: Implement dispatchRequest() method.
        $res   = null;
        $query = '?'.Helper::queryBuilder($params);

        try {
            $res = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/'.$query, [
                'curl' => [
                    CURLOPT_USERPWD        => $this->authentication['auth'][0].":".$this->authentication['auth'][1],
                    CURLOPT_TIMEOUT        => 30,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_RETURNTRANSFER => true
                ]
            ]);
        } catch (RequestException $e) {
            echo 'Fail!<br>';
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        $result = $res->getBody();

        return json_decode((string)$result)->responseData;
    }

    /**
     * Dispatch Curl Submission
     *
     * @param string $request
     * @param array $params
     *
     * @return \stdClass
     */
    public function dispatchSubmission(string $request, array $params): \stdClass
    {
        $res = null;

        try {
            $res = curl_init($this->baseUrl.'/'.$request.'/');
            curl_setopt($res, CURLOPT_USERPWD, $this->authentication['auth'][0].":".$this->authentication['auth'][1]);
            curl_setopt($res, CURLOPT_POST, 1);
            curl_setopt($res, CURLOPT_POSTFIELDS, json_encode($params));
            curl_setopt($res, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($res, CURLOPT_TIMEOUT, 30);
            curl_setopt($res, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($res, CURLOPT_RETURNTRANSFER, true);
        } catch (RequestExceptions $e) {
            echo $e;
        }

        $result = curl_exec($res);

        return json_decode((string)$result)->responseData;
    }
}