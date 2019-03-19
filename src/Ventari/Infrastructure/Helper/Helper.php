<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure\Helper
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

namespace Tollwerk\Ventari\Infrastructure\Helper;

/**
 * Helper
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Infrastructure\Helper
 */
class Helper
{
    /**
     * Return the string for a Ventari fields format query
     *
     * @param array $params Query parameters
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
     * Return the string for a Ventari frontend link
     *
     * @param string $eventId         Event Id
     * @param string $participantId   Participant Id
     * @param string $participantHash Participant hash
     * @param string $languageId      Langague Id
     *
     * @return string
     */
    public static function createFrontendLink($eventId, $participantId, $participantHash, $languageId): string
    {
        $link = '/tms/frontend/index.cfm?'.http_build_query([
                'l'     => $eventId,
                'id'    => $participantId,
                'sp_id' => $languageId,
                'dat_h' => $participantHash
            ]);

        return $link;
    }
}
