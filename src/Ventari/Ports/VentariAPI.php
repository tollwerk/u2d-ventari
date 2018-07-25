<?php
/**
 * Created by PhpStorm.
 * User: philipsaa
 * Date: 7/25/18
 * Time: 13:10
 */

namespace Tollwerk\Ventari\Ports;

class VentariAPI
{
    /**
     * [GET] Functions
     */

    public function getEventIds(array $events)
    {
        $queryString = '?eventIds=';
        foreach($events as $event){
            $queryString .= $event;
            if (next($events)==true) $queryString .= ",";
        }
        return $queryString;
//        return '?eventIds=1800,1845,1860';
    }

    public function getStatusIds(array $statusIds)
    {
        /**
         * TODO: goal to build query string
         * ?statusIds=1,2,6
         */
    }

    public function getFilterStartDate(string $date)
    {
        /**
         * TODO: goal to build query string
         * ?filterStarDate=01.12.2018
         */
    }

    public function getFilterEndDate(string $date)
    {
        /**
         * TODO: goal to build query string
         * ?filterEndDate=31.12.2018
         */
    }

    public function getPersonIds(array $personIds)
    {
        /**
         * TODO: goal to build query string
         * ?personIds=1,31
         */
    }

    public function getPage(string $pageId)
    {
        /**
         * TODO: goal to build query string
         * ?page=1
         */
    }

    /**
     * TODO: define functions for | order,direction | num | count |
     */
}