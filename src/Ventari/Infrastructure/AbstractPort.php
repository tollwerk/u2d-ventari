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
        $userValid = false;
        $response  = null;
        $filter    = [
            'filterEventId' => $eventId,
            'filterFields'  => [
                'pa_email' => $participantEmail,
            ],
        ];


        $clientResponse = $this->client->dispatchCurlRequest('participants/', $filter);

        if ($clientResponse->resultCount) {
            $userValid = true;
            $response  = $clientResponse->participants;
        } else {
            $participant = $this->getRegisteredEvents($participantEmail);

            $filter = [
                'eventId' => $eventId,
                'fields'  => [
                    'pa_email' => $participantEmail,
                ]
            ];
            if (count($participant) > 0) {
                $filter['personId'] = $participant[0]->personId;
            }
            $submission = $this->client->dispatchCurlSubmission('participants/', $filter);
            $response   = $submission;
        }

        $email = '';

        if ($userValid) {
            /** Valid User */
            $personId = $response[0]->personId;
            $fields   = $response[0]->fields;
        } else {
            /** Invalid User */
            $personId = $response->participants[0]->personId;
            $fields   = $response->participants[0]->fields;
        }

        foreach ($fields as $field) {
            if ($field->token === 'pa_email') {
                $email = $field->value;
            }
        }

        return [
            'personId' => $personId,
            'email'    => $email
        ];
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
        $_events = [];
        $filter  = [
            'filterActiveEvents' => 1,
            'filterFields'       => [
                'pa_email' => $participantEmail,
            ],
        ];

        $events = $this->client->dispatchCurlRequest('participants/', $filter);

        foreach ($events->participants as $event) {
            $_events[] = $event->eventId;
        }

        return $_events;
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