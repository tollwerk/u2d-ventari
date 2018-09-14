<?php

namespace Tollwerk\Ventari\Ports;

use Tollwerk\Ventari\Infrastructure\AbstractPort;


/**
 * Class Client
 * @package Tollwerk\Ventari\Ports
 */
class Client extends AbstractPort
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

    public function getAllParticipants(): ?array
    {
        return parent::makeRequest('participants', ['filterActiveEvents' => true]);
    }
}
