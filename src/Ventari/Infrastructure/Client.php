<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure
 * @author     Philip Saa <philip@tollwerk.de> / @cowglow
 * @copyright  Copyright © 2019 Philip Saa <philip@tollwerk.de> / @cowglow
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

/***********************************************************************************
 *  The MIT License (MIT)
 *
 *  Copyright © 2019 Philip Saa <philip@tollwerk.de>
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"), to deal in
 *  the Software without restriction, including without limitation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ***********************************************************************************/

namespace Tollwerk\Ventari\Infrastructure;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Tollwerk\Ventari\Infrastructure\Exception\RuntimeException;
use Tollwerk\Ventari\Infrastructure\Helper\Helper;

/**
 * Client
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure
 */
class Client
{
    /**
     * Client
     *
     * @var HttpClient $client
     */
    protected $client;

    /**
     * Handler
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
     * Participant statuses
     */
    const PARTICIPANT_NEW = 0;
    const PARTICIPANT_INVITED = 1;
    const PARTICIPANT_HAS_CONFIRMED_NO_DHG = 3;
    const PARTICIPANT_HAS_CONFIRMED = 4;
    const PARTICIPANT_WITHDRAWN = 5;
    const PARTICIPANT_WITHDRAWN_AFTER_CONFIRMATION = 6;
    const PARTICIPANT_PARTICIPATED = 7;
    const PARTICIPANT_NO_SHOW = 8;
    const PARTICIPANT_WAITING_LIST = 9;
    const PARTICIPANT_EARMARKED = 10;
    const PARTICIPANT_NOMINATED_LATER_ON = 11;
    const PARTICIPANT_REJECTED = 12;
    const PARTICIPANT_DATE_ASSIGNED = 13;
    const PARTICIPANT_WAS_APPROVED = 14;
    const PARTICIPANT_VA_CREATED = 15;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $method           = getenv('VENTARI_API_METHOD');
        $api              = getenv('VENTARI_API_URL');
        $authentication   = [
            'username' => getenv('VENTARI_API_USERNAME'),
            'password' => getenv('VENTARI_API_PASSWORD')
        ];
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
     * @throws Exception
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
     * @return array File
     */
    protected function getFile(string $id): array
    {
        $files = $this->client->dispatchRequest('files/'.$id, [])->files;

        return count($files) ? (array)array_shift($files) : [];
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
     * @param string $participantEmail Participant email address
     * @param int $eventId             Event ID
     * @param int $status              Participation status
     * @param array $additionalFields  Additional fields
     *
     * @return array|null
     * @throws GuzzleException
     */
    protected function registerForEvent(
        string $participantEmail,
        int $eventId,
        int $status,
        array $additionalFields = []
    ): ?array {
        $clientResponse = null;
        $baseUrl        = getenv('VENTARI_API_URL');
        $response       = null;
        $email          = '';

        // STEP 1. Request Participant Record with EventId
        try {
            $clientResponse = $this->handler->dispatchRequest('participants', [
                'filterEventId' => $eventId,
                'filterFields'  => [
                    'pa_email' => $participantEmail,
                ],
            ]);
        } catch (Exception $exception) {
            throw new RuntimeException($exception->getMessage(), $exception->getCode());
        }

        // STEP 2. Confirm if the participant is already registered
        if ($clientResponse->resultCount) {
            // STEP 2.a - Return participant's record
            $response = $clientResponse->participants[0];

        } else {
            // STEP 2.b - Request Record of Participant
            try {
                $clientResponse = $this->handler->dispatchRequest('participants', [
                    'filterActiveEvents' => 1,
                    'filterFields'       => [
                        'pa_email' => $participantEmail
                    ]
                ]);
            } catch (Exception $exception) {
                throw new RuntimeException($exception->getMessage(), $exception->getCode());
            }

            // STEP 3 Throw Exception when Participant ID is missing from request
            if (!isset($clientResponse->participants[0]->personId)) {
                $ventariPersonId = 0;
            } else {
                $ventariPersonId = $clientResponse->participants[0]->personId;
            }

            if ($ventariPersonId === '') {
                throw new RuntimeException(
                    sprintf(RuntimeException::RESPONSE_PERSONID_STR, 'PersonId is Empty string for '.$participantEmail),
                    RuntimeException::RESPONSE_PERSONID
                );
            }

            // Prepare the update parameters
            $parameters = [
                'eventId' => $eventId,
                'fields'  => array_merge(
                    $additionalFields,
                    ['pa_email' => $participantEmail]
                ),
                'status'  => $status
            ];

            if ($clientResponse->resultCount !== 0) {
                $parameters['personId'] = $ventariPersonId;
            }

            // Submit with or without the personId
            try {
                $response = $this->handler->dispatchSubmission('participants', $parameters)->participants[0];
            } catch (Exception $exception) {
                throw new RuntimeException($exception->getMessage(), $exception->getCode());
            }
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
     * Unregister from an event
     *
     * @param string $participantEmail Participant email address
     * @param int $eventId             Event ID
     *
     * @return bool Success
     * @throws GuzzleException
     */
    public function unregisterFromEvent(string $participantEmail, int $eventId): bool
    {
        // Query the participant
        try {
            $clientResponse = $this->handler->dispatchRequest('participants', [
                'filterEventId' => $eventId,
                'filterFields'  => [
                    'pa_email' => $participantEmail,
                ],
            ]);
            if ($clientResponse && isset($clientResponse->resultCount) && $clientResponse->resultCount) {
                $participant = $clientResponse->participants[0];
                $parameters  = [
                    'eventId' => $eventId,
                    'fields'  => [
                        'pa_email' => $participantEmail,
                    ],
                    'status'  => ($participant->status == static::PARTICIPANT_WAITING_LIST)
                        ? static::PARTICIPANT_WITHDRAWN : static::PARTICIPANT_WITHDRAWN_AFTER_CONFIRMATION,
                ];

                if (isset($participant->personId)) {
                    $parameters['personId'] = $participant->personId;
                }

                // Update participant
                $response = $this->handler->dispatchSubmission('participants/'.$participant->id, $parameters);

                return $response && isset($response->resultCount) && intval($response->resultCount);
            }
        } catch (Exception $exception) {
            throw new RuntimeException($exception->getMessage(), $exception->getCode());
        }

        return false;
    }

    /**
     * Registered Events
     *
     * @param string $participantEmail
     *
     * @return array|null
     * @throws GuzzleException
     */
    protected function getRegisteredEvents(string $participantEmail): ?array
    {
        $_events = [];
        $baseUrl = 'https://events.nuernberg.digital';
        $filter  = [
            'filterActiveEvents' => 1,
            'filterFields'       => [
                'pa_email' => $participantEmail,
            ],
        ];

        $events = $this->handler->dispatchRequest('participants', $filter);

        if (isset($events->participants)) {
            foreach ($events->participants as $event) {
                $link                     = Helper::createFrontendLink(
                    $event->eventId,
                    $event->id,
                    $event->hash,
                    $event->languageId
                );
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

        /**
         * Try to Request All Events
         */
        try {
            $events = $this->client->dispatchRequest('events', []);
        } catch (Exception $exception) {
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
        } catch (Exception $exception) {
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
}
