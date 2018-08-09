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
     * @param array|null $params
     *
     * @return ControllerInterface
     */
    public function getEvents(array $params = null): array
    {
        $_params = (count($params) > 0) ? $params : [];

        return $this->makeRequest('events', $_params);
    }

    /**
     * @param array|null $params
     *
     * @return ControllerInterface
     */
    public function getLocations(array $params = null): array
    {
        $_params = (count($params) > 0) ? $params : [];

        return $this->makeRequest('views/locations', $_params);
    }

    /**
     * @param array|null $params
     *
     * @return ControllerInterface
     */
    public function getSessions(array $params = null): array
    {
        $_params = (count($params) > 0) ? $params : [];

        return $this->makeRequest('views/agenda', $_params);
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
