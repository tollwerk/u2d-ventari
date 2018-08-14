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
     * @api
     */
    public function getEvents(array $params = []): array
    {
        return $this->makeRequest('events', $params);
    }

    public function getSpeakers(array $params = []): array
    {
        return $this->makeRequest('participants', $params);
    }

    /**
     * Return all locations
     *
     * @param array $params Parameters
     *
     * @return array Locations
     * @api
     */
    public function getLocations(array $params = []): array
    {
        return $this->makeRequest('views/locations', $params);
    }

    /**
     * Return all sessions
     *
     * @param array $params
     *
     * @return array Sessions
     * @api
     */
    public function getSessions(array $params = []): array
    {
        return $this->makeRequest('views/agenda', $params);
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
        return $this->requestFile($id);
    }
}
