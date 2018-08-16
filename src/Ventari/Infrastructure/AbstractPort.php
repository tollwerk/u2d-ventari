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
        $this->handler    = new CurlClient($method, $api, $authentication);
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
        /**
         * TODO: Improve integration of baseUrl
         */
        $baseUrl   = 'https://events.nueww.de';
        $userValid = false;
        $response  = null;
        $filter    = [
            'filterEventId' => $eventId,
            'filterFields'  => [
                'pa_email' => $participantEmail,
            ],
        ];

//        try {
        $clientResponse = $this->handler->dispatchRequest('participants/', $filter);
//        } catch($e) {
//            echo $e;
//        }

        echo '<pre>';
        echo '<h3>$clientResponse: </h3>';
        print_r($clientResponse);
        echo '</pre>';

        if ($clientResponse->resultCount) {
            $userValid = true;
            $response  = $clientResponse->participants;
        } else {
            $participant = $this->getRegisteredEvents($participantEmail);
            $filter      = [
                'eventId' => $eventId,
                'fields'  => [
                    'pa_email' => $participantEmail,
                ]
            ];
            if (count($participant) > 0) {
                $filter['personId'] = $participant[0]->personId;
            }
            $submission = $this->handler->dispatchSubmission('participants/', $filter);
            $response   = $submission;
        }

        $email = '';

        if ($userValid) {
            /** Valid User */
            $resource = $response[0];
        } else {
            /** Invalid User */
            $resource = $response->participants[0];
        }

        foreach ($resource->fields as $field) {
            if ($field->token === 'pa_email') {
                $email = $field->value;
            }
        }

        return [
            'personId' => $resource->personId,
            'email'    => $email,
            'link'     => $baseUrl.Helper::createFrontendLink(
                    $resource->eventId,
                    $resource->personId,
                    $resource->hash,
                    $resource->languageId)
        ];

//        return [];
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

        $events = $this->handler->dispatchRequest('participants/', $filter);
        if (isset($events->participants)) {
            foreach ($events->participants as $event) {
                $_events[] = $event->eventId;
            }
        }

        return $_events;
    }

    protected function getEventParticipants(): ?array
    {
        $eventIds         = [];
        $participantCount = [];
        try {
            $events = $this->client->dispatchRequest('events', []);
        } catch (\Exception $exception) {
            echo '<h3>Fail! </h3>';
            echo $exception;
        }

        foreach ($events->events as $event) {
            $eventIds[] = $event->event_id;
        }

        foreach ($eventIds as $event) {
            $participants = $this->client->dispatchRequest('participants', ['filterEventId' => $event]);

            $participantCount[$event] = $participants->resultCount;
        }

        return $participantCount;
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