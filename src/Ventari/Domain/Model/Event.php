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

use Tollwerk\Ventari\Domain\Contract\EventInterface;
use Tollwerk\Ventari\Domain\Model\Traits\EventContactTrait;
use Tollwerk\Ventari\Domain\Model\Traits\EventDateTrait;
use Tollwerk\Ventari\Domain\Model\Traits\EventLinkTrait;

/**
 * Event
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Domain\Model
 */
class Event extends AbstractModel implements EventInterface
{
    /**
     * Use traits
     */
    use EventContactTrait, EventDateTrait, EventLinkTrait;

    /**
     * Ventari categories
     *
     * @var array
     */
    protected $ventariCategories = [];

    /**
     * Chargeable flag
     *
     * @var boolean
     */
    protected $chargeable = false;

    /**
     * Locality
     *
     * @var string
     */
    protected $locality = '';

    /**
     * Ticket description
     *
     * @var string
     */
    protected $ticketDescription = '';

    /**
     * Ticket price
     *
     * @var float
     */
    protected $ticketPrice = 0.0;

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Summary
     *
     * @var string
     */
    protected $summary = '';

    /**
     * Image
     *
     * @var string
     */
    protected $image = '';

    /**
     * Level
     *
     * @var array
     */
    protected $level = [];

    /**
     * Maximum participants
     *
     * @var int
     */
    protected $maxParticipants = 0;

    /**
     * Waitinglist active
     *
     * @var bool
     */
    protected $waitinglistActive = false;

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Tags
     *
     * @var string
     */
    protected $tags = '';

    /**
     * Presentation language
     *
     * @var array
     */
    protected $presentationLanguage = [];

    /**
     * Status
     *
     * @var int
     */
    protected $status = null;

    /**
     * Target group
     *
     * @var array
     */
    protected $targetGroup = [];

    /**
     * Track
     *
     * @var array
     */
    protected $tracks = [];

    /**
     * Registration link
     *
     * @var string
     */
    protected $registration = '';

    /**
     * Return the Ventari categories
     *
     * @return array
     */
    public function getVentariCategories(): array
    {
        return $this->ventariCategories;
    }

    /**
     * Set the Ventari categories
     *
     * @param array $ventariCategories
     */
    public function setVentariCategories(array $ventariCategories): void
    {
        $this->ventariCategories = $ventariCategories;
    }

    /**
     * Return the chargeable boolean flag
     *
     * @return bool
     */
    public function isChargeable(): bool
    {
        return $this->chargeable;
    }

    /**
     * Set the chargeable boolean flag
     *
     * @param bool $chargeable
     */
    public function setChargeable(bool $chargeable): void
    {
        $this->chargeable = $chargeable;
    }

    /**
     * Return the locality
     *
     * @return string
     */
    public function getLocality(): string
    {
        return $this->locality;
    }

    /**
     * Set the locality
     *
     * @param string $locality
     */
    public function setLocality(string $locality): void
    {
        $this->locality = $locality;
    }

    /**
     * Return the ticket description
     *
     * @return string
     */
    public function getTicketDescription(): string
    {
        return $this->ticketDescription;
    }

    /**
     * Set the ticket description
     *
     * @param string $ticketDescription
     */
    public function setTicketDescription(string $ticketDescription): void
    {
        $this->ticketDescription = $ticketDescription;
    }

    /**
     * Return the ticket price
     *
     * @return float
     */
    public function getTicketPrice(): float
    {
        return $this->ticketPrice;
    }

    /**
     * Set the ticket price
     *
     * @param string $ticketPrice
     */
    public function setTicketPrice(string $ticketPrice): void
    {
        $ticketPrice = preg_replace('/^[^\d]*/', '', $ticketPrice);
        if (preg_match('/^(\d+(?:(?:\.|\,)\d+)?)/', $ticketPrice, $price)) {
            $this->ticketPrice = floatval(strtr($price[1], ',', '.'));
        } else {
            $this->ticketPrice = floatval($ticketPrice);
        }
    }

    /**
     * Return the description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the description
     *
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Return the summary
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * Set the summary
     *
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * Return the image
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the image
     *
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * Return the level
     *
     * @return array
     */
    public function getLevel(): array
    {
        return $this->level;
    }

    /**
     * Set the level
     *
     * @param array $level
     */
    public function setLevel(array $level): void
    {
        $this->level = $level;
    }

    /**
     * Return the maximum participants
     *
     * @return int
     */
    public function getMaxParticipants(): int
    {
        return $this->maxParticipants;
    }

    /**
     * Set the maximum participants
     *
     * @param int $maxParticipants
     */
    public function setMaxParticipants(int $maxParticipants): void
    {
        $this->maxParticipants = $maxParticipants;
    }

    /**
     * Return whether there's a waiting list
     *
     * @return bool Active waiting list
     */
    public function isWaitinglistActive(): bool
    {
        return $this->waitinglistActive;
    }

    /**
     * Set whether there's a waiting list
     *
     * @param bool $waitinglistActive Active waiting list
     */
    public function setWaitinglistActive(bool $waitinglistActive): void
    {
        $this->waitinglistActive = $waitinglistActive;
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
     * Return the tags
     *
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * Set the tags
     *
     * @param string $tags
     */
    public function setTags(string $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * Return the presentation language
     *
     * @return array
     */
    public function getPresentationLanguage(): array
    {
        return $this->presentationLanguage;
    }

    /**
     * Set the presentation language
     *
     * @param array $presentationLanguage
     */
    public function setPresentationLanguage(array $presentationLanguage): void
    {
        $this->presentationLanguage = $presentationLanguage;
    }

    /**
     * Return the status
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set the status
     *
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = intval($status);
    }

    /**
     * Return the target group
     *
     * @return array
     */
    public function getTargetgroup(): array
    {
        return $this->targetGroup;
    }

    /**
     * Set the target group
     *
     *
     * @param array $targetgroup
     */
    public function setTargetGroup(array $targetGroup): void
    {
        $this->targetGroup = $targetGroup;
    }

    /**
     * Return the tracks
     *
     * @return array
     */
    public function getTracks(): array
    {
        return $this->tracks;
    }

    /**
     * Set the tracks
     *
     * @param array $tracks
     */
    public function setTracks(array $tracks): void
    {
        $this->tracks = $tracks;
    }

    /**
     * Return the registration
     *
     * @return string
     */
    public function getRegistration(): string
    {
        return $this->registration;
    }

    /**
     * Set the registration
     *
     * @param string $registration
     */
    public function setRegistration(string $registration): void
    {
        $this->registration = $registration;
    }
}
