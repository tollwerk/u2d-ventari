<?php

namespace Tollwerk\Ventari\Infrastructure\Helper;

/**
 * Class Helper
 * @package Tollwerk\Ventari\Infrastructure\Helper
 */
class Helper
{
    /**
     * Builds String Query for Ventari 'Fields' Format
     *
     * @param array $params
     *
     * @return string
     */
    public static function queryBuilder(array $params): string
    {
        $index  = 0;
        $output = '';
        foreach ($params as $key => $value) {
            $index++;

            if (!\is_array($value)) {
                $output .= http_build_query([$key => $value]);
            } else {
                $subIndex = 0;
                $output   .= $key.'={';
                foreach ($value as $k => $v) {
                    $subIndex++;
                    $output .= '"'.$k.'":"'.$v.'"';
                    if (count($value) !== $subIndex) {
                        $output .= ',';
                    }
                }
                $output .= '}';
            }

            if (count($params) !== $index) {
                $output .= '&';
            }
        }

        return $output;
    }

    /**
     * Builds String Link for Ventari Frontend Link
     *
     * @param $eventId
     * @param $participantId
     * @param $participantHash
     * @param $languageId
     *
     * @return string
     */
    public static function createFrontendLink($eventId, $participantId, $participantHash, $languageId): string
    {
        $link = '/tms/frontend/index.cfm';
        $link .= '?l='.$eventId;
        $link .= '&amp;id='.$participantId;
        $link .= '&amp;sp_id='.$languageId;
        $link .= '&amp;dat_h='.$participantHash;

        return $link;
    }
}
