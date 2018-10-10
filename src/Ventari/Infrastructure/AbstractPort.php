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
     * @throws \Exception
     */
    protected function makeRequest(string $function, array $params): array
    {
        $dispatchResponse = [];
        $clientResponse   = $this->client->dispatchRequest($function, $params);
        $function         = str_replace('views/', '', $function);

        try {
            $dispatchResponse = $this->dispatcher->dispatch($function, $clientResponse);
        } catch (\RuntimeException $e) {
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
        $baseUrl  = 'https://events.nueww.de';
        $response = null;
        $email    = '';
        /**
         * STEP 1. Request Participant Record with EventId
         */
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

        /**
         * STEP 2. Confirm if the participant is already registered
         */
        if ($clientResponse->resultCount) {
            /**
             * STEP 2.a - Return participant's record
             */
            $response = $clientResponse->participants[0];
        } else {
            /**
             * STEP 2.b - Request Record of Participant
             */
            $clientResponse = $this->handler->dispatchRequest('participants', [
                'filterActiveEvents' => 1,
                'filterFields'       => [
                    'pa_email' => $participantEmail
                ]
            ]);

            /**
             * STEP 3 Throw Exception when Participant ID is missing from request
             */
            if (!isset($clientResponse->participants[0]->personId)) {
                $ventariPersonId = 0;
            } else {
                $ventariPersonId = $clientResponse->participants[0]->personId;
            }

            $filter = [
                'eventId' => $eventId,
                'fields'  => [
                    'pa_email' => $participantEmail,
                ]
            ];

            if ($ventariPersonId === '') {
                throw new RuntimeException(
                    sprintf(RuntimeException::RESPONSE_PERSONID_STR, 'PersonId is Empty string for '.$participantEmail),
                    RuntimeException::RESPONSE_PERSONID
                );
            }

            if ($clientResponse->resultCount !== 0) {
//                $filter['personId'] = $clientResponse->participants[0]->personId;
                $filter['personId'] = $ventariPersonId;
            }

            /**
             * About to make submission with or without the personId
             */
            $submission = $this->handler->dispatchSubmission('participants', $filter);
            $response   = $submission->participants[0];
        }


        if (!isset($response->personId)) {
            throw new RuntimeException(
                sprintf(RuntimeException::RESPONSE_PERSONID_STR, 'PersonId'),
                RuntimeException::RESPONSE_PERSONID
            );
        }

        foreach ($response->fields as $field) {
            if ($field->token === 'pa_email') {
                $email = $field->value;
            }
        }

        /**
         * The FE Link required the ID property. Not the personId
         */
        $link = Helper::createFrontendLink($response->eventId, $response->id, $response->hash, $response->languageId);

        return [
            'personId' => $response->personId,
            'email'    => $email,
            'link'     => $baseUrl.$link
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
        $baseUrl = 'https://events.nueww.de';
        $filter  = [
            'filterActiveEvents' => 1,
            'filterFields'       => [
                'pa_email' => $participantEmail,
            ],
        ];

        $events = $this->handler->dispatchRequest('participants', $filter);

        if (isset($events->participants)) {
            foreach ($events->participants as $event) {
                $link                     = Helper::createFrontendLink($event->eventId, $event->id, $event->hash,
                    $event->languageId);
                $_events[$event->eventId] = [
                    'status' => $event->status,
                    'link'   => $baseUrl.$link
                ];
            }
        }

        return $_events;
    }

    /**
     * Event Participants
     *
     * @param int|null $status
     *
     * @return array|null
     */
    protected function getEventParticipants(int $status = null): ?array
    {
        $eventIds         = [];
        $participantCount = [];
        $statusIds        = [0, 1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];


        /**
         * Check if the submitted status is valid
         */
//        if (in_array($status, $statusIds, true)) {
//            throw new RuntimeException(
//                sprintf(RuntimeException::METHOD_EVENTPARTICIPANTS_STR, $status),
//                RuntimeException::METHOD_EVENTPARTICIPANTS
//            );
//        }

        /**
         * Try to Request All Events
         */
        try {
            $events = $this->client->dispatchRequest('events', []);
        } catch (\Exception $exception) {
            echo $exception;
            throw new RuntimeException($exception->getMessage(), '4010');
        }

        /**
         * Extract event ids and populate array
         */
        foreach ($events->events as $event) {
            $eventIds[] = $event->event_id;
        }

        /**
         * Iterate through event ids and request Participants
         */
        foreach ($eventIds as $event) {
            $dispatchResponse = $this->client->dispatchRequest('participants', ['filterEventId' => $event]);

            /**
             * Apply status filter
             */
            if ($status === null) {
                /**
                 * Return results count from the dispatch response
                 */
                $participantCount[$event] = $dispatchResponse->resultCount;
            } else {
                /**
                 * Start Count of Participants with matching status
                 */
                $participantIndex = 0;
                foreach ($dispatchResponse->participants as $participant) {
                    if ($participant->status === $status) {
                        $participantIndex++;
                    }
                }
                /**
                 * Return participant index count from matching status
                 */
                $participantCount[$event] = $participantIndex;
            }
        }

        return $participantCount;
    }

    /**
     * Return Event Status Ids
     *
     * @param int $eventId
     * @param array $statusIds
     *
     * @return array|null
     */
    protected function getEventParticipantStatus(int $eventId, array $statusIds): ?array
    {
        $eventStatusIds = [
            $eventId => []
        ];

        try {
            $dispatchResponse = $this->client->dispatchRequest('participants', ['filterEventId' => $eventId]);
        } catch (\Exception $exception) {
            echo $exception;
            throw new RuntimeException($exception->getMessage(), '4013');
        }

        foreach ($statusIds as $status) {
            $participantIndex = 0;
            foreach ($dispatchResponse->participants as $participant) {
                if ((int)$participant->status === (int)$status) {
                    $participantIndex++;
                }
            }
            $eventStatusIds[$eventId][$status] = $participantIndex;
        }

        return $eventStatusIds;
    }

    /**
     * For Testing Purposes Only
     *
     * @param $arg1
     * @param $arg2
     *
     * @return array
     * @throws \Exception
     */
    public function accessMakeRequest($arg1, $arg2): array
    {
        return $this->makeRequest($arg1, $arg2);
    }

}
