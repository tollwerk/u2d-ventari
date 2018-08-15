<?php

namespace Tollwerk\Ventari\Infrastructure;

use GuzzleHttp\Client;
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
     * Authentication Array
     * @var array
     */
    protected $authentication;

    /**
     * HttpClient constructor.
     *
     * @param string $method
     * @param string $baseUrl
     * @param array $authentication
     */
    public function __construct(string $method, string $baseUrl, array $authentication)
    {
        $this->guzzle = new Client([
            'headers' => ['User-Agent' => 'Ventari WebService'],
        ]);

        $this->method         = $method;
        $this->baseUrl        = $baseUrl;
        $this->authentication = ['auth' => [$authentication['username'], $authentication['password']]];
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
    public function dispatchRequest(string $request, array $params): \stdClass
    {
        $res   = null;
        $query = '?'.http_build_query($params);

        try {
            $res = $this->guzzle->request($this->method, $this->baseUrl.'/'.$request.'/'.$query, $this->authentication);
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        $body = $res->getBody();

        return json_decode((string)$body)->responseData;
    }

    public function dispatchCurlSubmission(string $request, array $params): \stdClass
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
        } catch(RequestExceptions $e) {
            echo $e;
        }

        $result = curl_exec($res);
        return json_decode((string)$result)->responseData;
    }
    /**
     * @param string $request
     * @param array $params
     *
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function dispatchCurlRequest(string $request, array $params): \stdClass
    {
        $res   = null;
        $query = '?'.$this->queryBuilder($params);

        try {
            $res = curl_init($this->baseUrl.'/'.$request.'/'.$query);
            curl_setopt($res, CURLOPT_USERPWD, $this->authentication['auth'][0].":".$this->authentication['auth'][1]);
            curl_setopt($res, CURLOPT_TIMEOUT, 30);
            curl_setopt($res, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($res, CURLOPT_RETURNTRANSFER, true);

        } catch (RequestException $e) {
            echo $e;
        }

        $result = curl_exec($res);
        return json_decode((string)$result)->responseData;
    }

    public function queryBuilder(array $params): string
    {
        $index  = 0;
        $output = '';
        foreach ($params as $key => $value) {
            $index++;

            if (gettype($value) !== 'array') {
                $output .= http_build_query([$key => $value]);
            } else {
                $subIndex = 0;
                $output   .= $key.'={';
                foreach ($value as $k => $v) {
                    $subIndex++;
                    $output .= '"'.$k.'":"'.$v.'"';
                    if (count($value) !== $subIndex) {
                        $output .= ',';
                    }
                }
                $output .= '}';
            }

            if (count($params) !== $index) {
                $output .= '&';
            }
        }

        return $output;
    }
}
