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
 * Event Contact Trait
 *
 * @package Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Domain\Model\Traits
 */
trait EventContactTrait
{
    /**
     * Organizer email
     *
     * @var string
     */
    protected $organizerEmail = '';

    /**
     * Organizer Facebook link
     *
     * @var string
     */
    protected $organizerFacebook = '';

    /**
     * Organizer Instagram link
     *
     * @var string
     */
    protected $organizerInstagram = '';

    /**
     * Organizer other link
     *
     * @var string
     */
    protected $organizerOtherLink = '';

    /**
     * Organizer website link
     *
     * @var string
     */
    protected $organizerWebsite = '';

    /**
     * Organizer logo
     *
     * @var string
     */
    protected $organizerLogo = '';

    /**
     * Organizer name
     *
     * @var string
     */
    protected $organizerName = '';

    /**
     * Organizer Twitter link
     *
     * @var string
     */
    protected $organizerTwitter = '';

    /**
     * Return the organizer email
     *
     * @return string
     */
    public function getOrganizerEmail(): string
    {
        return $this->organizerEmail;
    }

    /**
     * Set the organizer email
     *
     * @param string $organizerEmail
     */
    public function setOrganizerEmail(string $organizerEmail): void
    {
        $this->organizerEmail = $organizerEmail;
    }

    /**
     * Return the organizer Facebook link
     *
     * @return string
     */
    public function getOrganizerFacebook(): string
    {
        return $this->organizerFacebook;
    }

    /**
     * Set the organizer Facebook link
     *
     * @param string $organizerFacebook
     */
    public function setOrganizerFacebook(string $organizerFacebook): void
    {
        $this->organizerFacebook = $organizerFacebook;
    }

    /**
     * Return the organizer Instagram link
     *
     * @return string
     */
    public function getOrganizerInstagram(): string
    {
        return $this->organizerInstagram;
    }

    /**
     * Set the organizer Instagram link
     *
     * @param string $organizerInstagram
     */
    public function setOrganizerInstagram(string $organizerInstagram): void
    {
        $this->organizerInstagram = $organizerInstagram;
    }

    /**
     * Return the organizer other link
     *
     * @return string
     */
    public function getOrganizerOtherLink(): string
    {
        return $this->organizerOtherLink;
    }

    /**
     * Set the organizer other link
     *
     * @param string $organizerOtherLink
     */
    public function setOrganizerOtherLink(string $organizerOtherLink): void
    {
        $this->organizerOtherLink = $organizerOtherLink;
    }

    /**
     * Return the organizer website link
     *
     * @return string
     */
    public function getOrganizerWebsite(): string
    {
        return $this->organizerWebsite;
    }

    /**
     * Set the organizer website link
     *
     * @param string $organizerWebsite
     */
    public function setOrganizerWebsite(string $organizerWebsite): void
    {
        $this->organizerWebsite = $organizerWebsite;
    }

    /**
     * Return the organizer logo
     *
     * @return string
     */
    public function getOrganizerLogo(): string
    {
        return $this->organizerLogo;
    }

    /**
     * Set the organizer logo
     *
     * @param string $organizerLogo
     */
    public function setOrganizerLogo(string $organizerLogo): void
    {
        $this->organizerLogo = $organizerLogo;
    }

    /**
     * Return the organizer name
     *
     * @return string
     */
    public function getOrganizerName(): string
    {
        return $this->organizerName;
    }

    /**
     * Set the organizer name
     *
     * @param string $organizerName
     */
    public function setOrganizerName(string $organizerName): void
    {
        $this->organizerName = $organizerName;
    }

    /**
     * Return the organizer Twitter link
     *
     * @return string
     */
    public function getOrganizerTwitter(): string
    {
        return $this->organizerTwitter;
    }

    /**
     * Set the organizer Twitter link
     *
     * @param string $organizerTwitter
     */
    public function setOrganizerTwitter(string $organizerTwitter): void
    {
        $this->organizerTwitter = $organizerTwitter;
    }
}
