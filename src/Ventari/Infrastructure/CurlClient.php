<?php

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7;
use Tollwerk\Ventari\Domain\Contract\CurlClientInterface;
use Tollwerk\Ventari\Ports\Exception\RuntimeException;
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
        $res   = null;
        $query = '?'.Helper::queryBuilder($params);

        try {
            $res  = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/'.$query, [
                'curl' => [
                    CURLOPT_USERPWD        => $this->authentication['auth'][0].':'.$this->authentication['auth'][1],
                    CURLOPT_TIMEOUT        => 30,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_RETURNTRANSFER => true
                ]
            ]);
            $body = $res->getBody();
        } catch (RequestException $exception) {
            echo 'RequestException'.PHP_EOL;

            if ($exception->hasResponse()) {
                echo Psr7\str($exception->getRequest());
            }

            throw new RuntimeException(
                RuntimeException::METHOD_CURLCLIENT_STR.' : '.$exception->getCode().
                PHP_EOL.Psr7\str($exception->getRequest()),
                RuntimeException::METHOD_CURLCLIENT
            );

        } catch (GuzzleException $exception) {
            echo 'GuzzleException'.PHP_EOL;

            throw new RuntimeException(
                RuntimeException::DEPENDENCY_EXCEPTION_STR.' : '.$exception->getCode().
                PHP_EOL.$exception->getMessage(),
                RuntimeException::DEPENDENCY_EXCEPTION
            );
        }

        try {
            $dispatchResponse = json_decode((string)$body)->responseData;
        } catch (\RuntimeException $exception) {
            echo '\RuntimeException'.PHP_EOL;

            throw new RuntimeException(
                RuntimeException::METHOD_CURLCLIENT_STR.' : '.
                $exception->getCode(),
                RuntimeException::METHOD_CURLCLIENT
            );
        }

        return $dispatchResponse;
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

        $requestData = json_encode($params);

        $process = curl_init($this->baseUrl.'/'.$request.'/');

        curl_setopt($process, CURLOPT_USERPWD, $this->authentication['auth'][0].':'.$this->authentication['auth'][1]);
        curl_setopt($process, CURLOPT_POST, 1);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestData);
        curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($process);
        $json = json_decode($result);
        return $json->responseData;
//        try {
//            $res  = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/', [
//                'curl' => [
//                    CURLOPT_USERPWD        => $this->authentication['auth'][0].':'.$this->authentication['auth'][1],
//                    CURLOPT_POST           => 1,
//                    CURLOPT_POSTFIELDS     => $requestData,
//                    CURLOPT_HTTPHEADER     => array('Content-Type:application/json'),
//                    CURLOPT_TIMEOUT        => 30,
//                    CURLOPT_SSL_VERIFYPEER => false,
//                    CURLOPT_RETURNTRANSFER => true,
//
//                ]
//            ]);
//            $body = $res->getBody();
//        } catch (RequestException $exception) {
//            echo 'RequestException'.PHP_EOL;
//
//            if ($exception->hasResponse()) {
//                echo Psr7\str($exception->getRequest());
//            }
//
//            throw new RuntimeException(
//                RuntimeException::METHOD_CURLCLIENT_STR.' : '.$exception->getCode().
//                PHP_EOL.Psr7\str($exception->getRequest()),
//                RuntimeException::METHOD_CURLCLIENT
//            );
//
//        } catch (GuzzleException $exception) {
//            echo 'GuzzleException'.PHP_EOL;
//
//            throw new RuntimeException(
//                RuntimeException::DEPENDENCY_EXCEPTION_STR.' : '.$exception->getCode().
//                PHP_EOL.$exception->getMessage(),
//                RuntimeException::DEPENDENCY_EXCEPTION
//            );
//        }
//
//        try {
//            $dispatchReponse = json_decode((string)$body)->responseData;
//        } catch (RequestException $exception) {
//            echo 'RequestException'.PHP_EOL;
//
//            if ($exception->hasResponse()) {
//                echo Psr7\str($exception->getRequest());
//            }
//
//            throw new RuntimeException(
//                RuntimeException::METHOD_CURLCLIENT_STR.' : '.$exception->getCode().
//                PHP_EOL.$exception->getMessage(),
//                RuntimeException::METHOD_CURLCLIENT
//            );
//        }
//
//        return $dispatchReponse;
    }
}