<?php

namespace Tollwerk\Ventari\Ports;

class VentariAPI
{
    /**
     * [GET] Functions
     *
     */

    public function getEventByIds(array $events)
    {
        $queryString = '?eventIds='.implode(',', array_filter($events));
        return $queryString;
//        return '?eventIds=1800,1845,1860';
    }

    public function getEventsByStatusIds(array $statusIds)
    {
        $queryString = '?statusIds='.implode(',', array_filter($statusIds));

        return $queryString;
//        return '?statusIds=1,2,6';
    }

    public function getEventsByFilterStartDate(string $date)
    {
        return '?filterStarDate='.$date;
//        return '?filterStarDate=01.12.2018';
    }

    public function getEventsByFilterEndDate(string $date)
    {
        return '?filterEndDate='.$date;
//        return '?filterEndDate=31.12.2018';
    }

    public function getEventsByPersonIds(array $personIds)
    {
        $queryString = '?personIds='.implode(',', array_filter($personIds));

        return $queryString;
//        return '?personIds=1,31';
    }

    public function getEventsByPage(string $pageId)
    {
        return '?page='.$pageId;
//        return '?page=1';
    }
    /**
     * TODO: define functions for | order,direction | num | count |
     */
}
