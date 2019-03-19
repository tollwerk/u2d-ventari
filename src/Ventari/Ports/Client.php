<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Ports
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

namespace Tollwerk\Ventari\Ports;

use Tollwerk\Ventari\Infrastructure\Client as InfrastructureClient;

/**
 * Client
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Ports
 */
class Client extends InfrastructureClient
{
    /**
     * Return all events
     *
     * @param array $params Parameters
     *
     * @return array Events
     * @throws \Exception
     * @api
     */
    public function getEvents(array $params = []): array
    {
        return parent::makeRequest('events', $params);
    }

    /**
     * Return all locations
     *
     * @param array $params Parameters
     *
     * @return array Locations
     * @throws \Exception
     * @api
     */
    public function getLocations(array $params = []): array
    {
        return parent::makeRequest('views/locations', $params);
    }

    /**
     * Return all sessions
     *
     * @param array $params
     *
     * @return array Sessions
     * @throws \Exception
     * @api
     */
    public function getSessions(array $params = []): array
    {
        return parent::makeRequest('views/agenda', $params);
    }

    /**
     * Return all speakers
     *
     * @param array $params
     *
     * @return array Speakers
     * @throws \Exception
     * @api
     */
    public function getSpeakers(array $params = []): array
    {
        return parent::makeRequest('views/speakers', $params);
    }

    /**
     * Return a file
     *
     * @param string $id File ID
     *
     * @return array File
     * @api
     */
    public function getFile(string $id): array
    {
        return parent::getFile($id);
    }

    /**
     * Get a speaker photo
     *
     * @param int $speakerId Speaker ID
     *
     * @return array Photo
     * @api
     */
    public function getSpeakerPhoto(int $speakerId): ?array
    {
        return parent::getSpeakerPhoto($speakerId);
    }

    /**
     * Register for Event
     *
     * @param string $participantEmail
     * @param int $eventId
     *
     * @return array|null
     * @api
     */
    public function registerForEvent(string $participantEmail, int $eventId): ?array
    {
        return parent::registerForEvent($participantEmail, $eventId);
    }

    /**
     * Return all registered|active events
     *
     * @param string $participantEmail
     *
     * @return array|null
     * @api
     */
    public function getRegisteredEvents(string $participantEmail): ?array
    {
        return parent::getRegisteredEvents($participantEmail);
    }

    /**
     * Return Events with Participant Count
     *
     * @param int $status
     *
     * @return array|null
     * @api
     */
    public function getEventParticipants(int $status = null): ?array
    {
        if (isset($status)) {
            return parent::getEventParticipants($status);
        } else {
            return parent::getEventParticipants();
        }
    }

    /**
     * Return Events status Ids
     *
     * @param int $eventId
     * @param array $statusIds
     *
     * @return array|null
     * @api
     */
    public function getEventParticipantStatus(int $eventId, array $statusIds = []): ?array
    {
        return parent::getEventParticipantStatus($eventId, $statusIds);
    }

    /**
     * Return all Participants
     *
     * @return array|null
     * @api
     * @throws \Exception
     */
    public function getAllParticipants(): ?array
    {
        return parent::makeRequest('participants', ['filterActiveEvents' => true]);
    }
}
