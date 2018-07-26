<?php

namespace Tollwerk\Ventari\Domain;

use Tollwerk\Ventari\Application\BaseController;
use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;
use Tollwerk\Ventari\Ports\VentariAPI;

class VentariClient implements ClientRest
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
        $config        = new BaseController('Ventari');
        $this->restAPI = $config->restAPI;
        $this->API     = new VentariAPI();
        $this->client  = $client;
    }

    public function get(array $request)
    {
        $method    = 'get'.ucfirst($request['method']);
        $apiMethod = $this->API->$method($request['data']);

        try {
            $response = $this->client->request('GET', $this->restAPI.$apiMethod, [
                'auth' => ['user', 'pass']
            ]);
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
        }
        print_r($response);

        return $apiMethod;
    }

    public function put(array $request)
    {
        // TODO: Implement put() method.
    }

    public function patch(array $request)
    {
        // TODO: Implement patch() method.
    }

    public function post(array $request)
    {
        // TODO: Implement post() method.
    }

    public function delete(array $request)
    {
        // TODO: Implement delete() method.
    }
}