<?php

namespace Tollwerk\Ventari\Ports;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Infrastructure\AbstractPort;


/**
 * Class Client
 * @package Tollwerk\Ventari\Ports
 */
class Client extends AbstractPort
{
    /**
     * @param array $params
     *
     * @return ControllerInterface
     */
    public function getEvents(array $params = []): array
    {
        return $this->makeRequest('events', $params);
    }

    /**
     * @param array $params
     *
     * @return ControllerInterface
     */
    public function getLocations(array $params = []): array
    {
        return $this->makeRequest('views/locations', $params);
    }

    /**
     * @param array $params
     *
     * @return ControllerInterface
     */
    public function getSessions(array $params = []): array
    {
        return $this->makeRequest('views/agenda', $params);
    }

    /**
     * @param string $id
     *
     * @return array
     */
    public function getEventLogo(string $id): array
    {
        return $this->requestFile($id);
    }
}
