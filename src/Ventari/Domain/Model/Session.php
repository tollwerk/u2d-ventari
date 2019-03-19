<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Domain\Model
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

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\SessionInterface;
use Tollwerk\Ventari\Domain\Model\Traits\CommonIntegerTrait;
use Tollwerk\Ventari\Domain\Model\Traits\SessionCategoryTrait;
use Tollwerk\Ventari\Domain\Model\Traits\SessionLineTrait;

/**
 * Session
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Domain\Model
 */
class Session extends AbstractModel implements SessionInterface
{
    /**
     * Use traits
     */
    use CommonIntegerTrait, SessionCategoryTrait, SessionLineTrait;

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Remark
     *
     * @var string
     */
    protected $remark = '';

    /**
     * Session start timestamp
     *
     * @var \DateTime
     */
    protected $startDateTime;

    /**
     * Session end timestamp
     *
     * @var \DateTime
     */
    protected $endDateTime;

    /**
     * Room
     *
     * @var string
     */
    protected $room = '';

    /**
     * Session constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $dateTimeZone = new \DateTimeZone('Europe/Berlin');
        $this->startDateTime = new \DateTime('@0');
        $this->startDateTime->setTimezone($dateTimeZone);
        $this->endDateTime   = new \DateTime('@0');
        $this->endDateTime->setTimezone($dateTimeZone);
    }

    /**
     * Return the name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the name
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Return the remark
     *
     * @return string
     */
    public function getRemark(): string
    {
        return $this->remark;
    }

    /**
     * Set the remark
     *
     * @param string $remark
     */
    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }

    /**
     * Return the session start timestamp
     *
     * @return \DateTime
     */
    public function getStartDateTime(): \DateTime
    {
        return $this->startDateTime;
    }

    /**
     * Set the session start timestamp
     *
     * @param \DateTime $startDateTime
     */
    public function setStartDateTime(\DateTime $startDateTime): void
    {
        $this->startDateTime = $startDateTime;
    }

    /**
     * Return the session end timestamp
     *
     * @return \DateTime
     */
    public function getEndDateTime(): \DateTime
    {
        return $this->endDateTime;
    }

    /**
     * Set the session end timestamp
     *
     * @param \DateTime $endDateTime
     */
    public function setEndDateTime(\DateTime $endDateTime): void
    {
        $this->endDateTime = $endDateTime;
    }

    /**
     * Return the room
     *
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * Set the room
     *
     * @param string $room
     */
    public function setRoom(string $room): void
    {
        $this->room = $room;
    }

    /**
     * Abstract method for unit test
     */
    public function abstractMethod()
    {
    }
}
