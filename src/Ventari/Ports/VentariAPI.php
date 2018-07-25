<?php

namespace Tollwerk\Ventari\Ports;

class VentariAPI
{
    /**
     * [GET] Functions
     */

    public function getEventIds(array $events)
    {
        $queryString = '?eventIds='.implode(',', array_filter($events));
        return $queryString;
//        return '?eventIds=1800,1845,1860';
    }

    public function getStatusIds(array $statusIds)
    {
        $queryString = '?statusIds=';
        foreach ($statusIds as $statusId) {
            $queryString .= $statusId;
            if (next($statusIds) == true) {
                $queryString .= ",";
            }
        }

        return $queryString;
//        return '?statusIds=1,2,6';
    }

    public function getFilterStartDate(string $date)
    {
        return '?filterStarDate='.$date;
//        return '?filterStarDate=01.12.2018';
    }

    public function getFilterEndDate(string $date)
    {
        return '?filterEndDate='.$date;
//        return '?filterEndDate=31.12.2018';
    }

    public function getPersonIds(array $personIds)
    {
        $queryString = '?personIds=';
        foreach ($personIds as $personId) {
            $queryString .= $personId;
            if (next($personIds) == true) {
                $queryString .= ',';
            }
        }

        return $queryString;
//        return '?personIds=1,31';
    }

    public function getPage(string $pageId)
    {
        return '?page='.$pageId;
//        return '?page=1';
    }

    /**
     * TODO: define functions for | order,direction | num | count |
     */
}
