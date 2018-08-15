<?php

namespace Tollwerk\Ventari\Infrastructure;


/**
 * Class AbstractPort
 * @package Tollwerk\Ventari\Infrastructure
 */
class AbstractPort
{
    /**
     * HTTP client
     *
     * @var HttpClient $client
     */
    protected $client;

    /**
     * Dispatcher
     *
     * @var DispatchController $dispatcher
     */
    protected $dispatcher;

    /**
     * Client constructor
     *
     * @param string $method        Request method
     * @param string $api           API URL
     * @param array $authentication Authentication credentials
     */
    public function __construct(string $method, string $api, array $authentication)
    {
        $this->client     = new HttpClient($method, $api, $authentication);
        $this->dispatcher = new DispatchController();
    }

    /**
     * Make an API request
     *
     * @param string $function API function
     * @param array $params    Request parameters
     *
     * @return array Response
     */
    protected function makeRequest(string $function, array $params): array
    {
        $clientResponse = $this->client->dispatchRequest($function, $params);
        $function       = str_replace('views/', '', $function);

        return $this->dispatcher->dispatch($function, $clientResponse);
    }

    /**
     * Request a file
     *
     * @param string $id File ID
     *
     * @return array|null File
     */
    protected function getFile(string $id): ?array
    {
        $files = $this->client->dispatchRequest('files/'.$id, [])->files;
        if (count($files)) {
            return (array)array_shift($files);
        }

        return null;
    }

    /**
     * Request a speaker photo
     *
     * @param int $speakerId Speaker ID
     *
     * @return array Photo
     */
    protected function getSpeakerPhoto(int $speakerId): ?array
    {
        $files = $this->client->dispatchRequest('participants/'.$speakerId.'/uploads/2026/', []);

        return (array)$files;
    }

    /**
     * Register for Event
     *
     * @param string $participantEmail
     * @param int $eventId
     *
     * @return array|null
     */
    protected function registerForEvent(string $participantEmail, int $eventId): ?array
    {
        $response = null;
        $filter = [
            'filterEventId' => $eventId,
            'filterFields'  => [
                'pa_email' => $participantEmail,
            ],
        ];

        $clientResponse = $this->client->dispatchCurlRequest('participants/', $filter);

//        echo '<pre>';
//        print_r($clientResponse);
//        echo '</pre>';

        if ($clientResponse->resultCount) {
            echo '<h3>User Exists: </h3>';
            $response = $this->getRegisteredEvents($participantEmail);
        } else {
            echo '<h3>User Does Not Exists: </h3>';
            $response = $this->getRegisteredEvents($participantEmail);
            if (count($response) <= 0){
                $filter = [
                    'eventId' => $eventId,
                    'fields'  => [
                        'pa_email' => $participantEmail,
                    ],
                ];
                $submission = $this->client->dispatchCurlSubmission('participants/', $filter);
                $response = $submission->participants;
            }
        }

        echo '<br>';

        return $response;
    }

    /**
     * Registered Events
     *
     * @param string $participantEmail
     *
     * @return array|null
     */
    protected function getRegisteredEvents(string $participantEmail): ?array
    {
        $filter = [
            'filterActiveEvents' => 1,
            'filterFields'  => [
                'pa_email' => $participantEmail,
            ],
        ];

        $clientResponse = $this->client->dispatchCurlRequest('participants/', $filter);

        return $clientResponse->participants;
    }

    /**
     * For Testing Purposes Only
     *
     * @param $arg1
     * @param $arg2
     *
     * @return array
     */
    public function accessMakeRequest($arg1, $arg2): array
    {
        return $this->makeRequest($arg1, $arg2);
    }

}