<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Domain\Model\Traits
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

namespace Tollwerk\Ventari\Domain\Model\Traits;

/**
 * Event Date Trait
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Domain\Model\Traits
 */
trait EventDateTrait
{
    /**
     * Event start timestamp
     *
     * @var \DateTime
     */
    protected $startDateTime;

    /**
     * Event end timestamp
     *
     * @var \DateTime
     */
    protected $endDateTime;

    /**
     * Event Date Trait constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $dateTimeZone        = new \DateTimeZone('Europe/Berlin');
        $this->startDateTime = new \DateTime('@0');
        $this->startDateTime->setTimezone($dateTimeZone);
        $this->endDateTime = new \DateTime('@0');
        $this->endDateTime->setTimezone($dateTimeZone);
    }

    /**
     * Return the event start timestamp
     *
     * @return \DateTime
     */
    public function getStartDateTime(): \DateTime
    {
        return $this->startDateTime;
    }

    /**
     * Set the event start timestamp
     *
     * @param array $modifiers Modifiers
     */
    public function setStartDateTime(array $modifiers): void
    {
        $this->startDateTime->setDate(
            intval(empty($modifiers['year']) ? $this->startDateTime->format('Y') : $modifiers['year']),
            intval(empty($modifiers['month']) ? $this->startDateTime->format('n') : $modifiers['month']),
            intval(empty($modifiers['day']) ? $this->startDateTime->format('j') : $modifiers['day'])
        );
        $this->startDateTime->setTime(
            intval(empty($modifiers['hour']) ? $this->startDateTime->format('G') : $modifiers['hour']),
            intval(empty($modifiers['minute']) ? (int)ltrim($this->startDateTime->format('i'),
                '0') : $modifiers['minute'])
        );
    }

    /**
     * Return the event end timestamp
     *
     * @return \DateTime
     */
    public function getEndDateTime(): \DateTime
    {
        return $this->endDateTime;
    }

    /**
     * Set the event end timestamp
     *
     * @param array $modifiers Modifiers
     */
    public function setEndDateTime(array $modifiers): void
    {
        $this->endDateTime->setDate(
            intval(empty($modifiers['year']) ? $this->endDateTime->format('Y') : $modifiers['year']),
            intval(empty($modifiers['month']) ? $this->endDateTime->format('n') : $modifiers['month']),
            intval(empty($modifiers['day']) ? $this->endDateTime->format('j') : $modifiers['day'])
        );
        $this->endDateTime->setTime(
            intval(empty($modifiers['hour']) ? $this->endDateTime->format('G') : $modifiers['hour']),
            intval(empty($modifiers['minute']) ? intval(ltrim($this->endDateTime->format('i'),
                '0')) : $modifiers['minute'])
        );
    }
}
