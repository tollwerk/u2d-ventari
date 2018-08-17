<?php

namespace Tollwerk\Ventari\Infrastructure;

use Tollwerk\Ventari\Infrastructure\Helper\Helper;
use Tollwerk\Ventari\Ports\Exception\RuntimeException;


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
     * CURL client
     *
     * @var CurlClient $handler
     */
    protected $handler;

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
        $dispatchResponse = [];
        $clientResponse   = $this->client->dispatchRequest($function, $params);
        $function         = str_replace('views/ ', '', $function);

        try {
            $dispatchResponse = $this->dispatcher->dispatch($function, $clientResponse);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return $dispatchResponse;
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
        $clientResponse = null;
        /**
         * TODO: Improve integration of baseUrl
         */
        $baseUrl   = 'https://events.nueww.de';
        $response  = null;

        try {
            $clientResponse = $this->handler->dispatchRequest('participants', [
                'filterEventId' => $eventId,
                'filterFields'  => [
                    'pa_email' => $participantEmail,
                ],
            ]);
        } catch (RuntimeException $exception) {
            echo $exception->getMessage();
        }


        if ($clientResponse->resultCount) {
            $response  = $clientResponse->participants[0];
        } else {
            $clientResponse = $this->handler->dispatchRequest('participants', [
                'filterActiveEvents' => 1,
                'filterFields'       => [
                    'pa_email' => $participantEmail
                ]
            ]);

            if (isset($clientResponse->participants[0]->personId)){
                throw new RuntimeException(
                    sprintf(RuntimeException::RESPONSE_PERSONID_STR, 'PersonId'),
                    RuntimeException::RESPONSE_PERSONID
                );
            }

            $filter = [
                'eventId' => $eventId,
                'fields'  => [
                    'pa_email' => $participantEmail,
                ]
            ];

            if ($clientResponse->resultCount !== 0) {
                $filter['personId'] = $clientResponse->participants[0]->personId;
            }

            /**
             * About to make submission with or without the personId
             */
            $submission = $this->handler->dispatchSubmission('participants', $filter);
            $response = $submission->participants[0];
        }

        $email = '';

        foreach ($response->fields as $field) {
            if ($field->token === 'pa_email') {
                $email = $field->value;
            }
        }

        return [
            'personId' => $response->personId,
            'email'    => $email,
            'link'     => $baseUrl.Helper::createFrontendLink(
                    $response->eventId,
                    $response->personId,
                    $response->hash,
                    $response->languageId)
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

        $events = $this->handler->dispatchRequest('participants', $filter);

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