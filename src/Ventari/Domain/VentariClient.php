<?php

namespace Tollwerk\Ventari\Domain;

use Tollwerk\Ventari\Application\BaseController;
use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;
use Tollwerk\Ventari\Ports\VentariAPI;

class VentariClient implements RestClient
{
    protected $API;

    /**
     * HTTP client
     *
     * @var HttpClientInterface
     */
    protected $client;
    protected $restAPI;

    public function __construct(ControllerInterface $config, HttpClientInterface $client)
    {
//        $config        = new BaseController('Ventari');
//        $this->restAPI = $config->restAPI;
//        $this->API     = new VentariAPI();
//        $this->client  = $client;
    }

    public function get(array $request)
    {
        // TODO: Implement get() method.
//        $method    = 'get'.ucfirst($request['method']);
//        $apiMethod = $this->API->$method($request['data']);
//
//        try {
//            $response = $this->client->request('GET', $this->restAPI.$apiMethod, [
//                'auth' => ['user', 'pass']
//            ]);
//        }
//        catch (GuzzleHttp\Exception\ClientException $e) {
//            $response = $e->getResponse();
//            $responseBodyAsString = $response->getBody()->getContents();
//        }
//        print_r($response);
//
//        return $apiMethod;
        return $request;
    }

    public function put(array $request)
    {
        // TODO: Implement put() method.
        return $request;
    }

    public function patch(array $request)
    {
        // TODO: Implement patch() method.
        return $request;
    }

    public function post(array $request)
    {
        // TODO: Implement post() method.
        return $request;
    }

    public function delete(array $request)
    {
        // TODO: Implement delete() method.
        return $request;
    }
}
