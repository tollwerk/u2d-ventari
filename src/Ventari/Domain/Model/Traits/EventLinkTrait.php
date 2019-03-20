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
 * Event Link Trait
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Domain\Model\Traits
 */
trait EventLinkTrait
{
    /**
     * Event Facebook event link
     *
     * @var string
     */
    protected $facebookEvent = '';

    /**
     * Event Twitter link
     *
     * @var string
     */
    protected $twitter = '';

    /**
     * Event Xing event link
     *
     * @var string
     */
    protected $xingEvent = '';

    /**
     * Event live stream embed link
     *
     * @var string
     */
    protected $livestreamEmbed = '';

    /**
     * Event live stream link
     *
     * @var string
     */
    protected $livestream = '';

    /**
     * Event ticket url
     *
     * @var string
     */
    protected $ticketUrl = '';

    /**
     * Event website link
     *
     * @var string
     */
    protected $website = '';

    /**
     * Return the Facebook event link
     *
     * @return string
     */
    public function getFacebookEvent(): string
    {
        return $this->facebookEvent;
    }

    /**
     * Set the Facebook event link
     *
     * @param string $facebookEvent
     */
    public function setFacebookEvent(string $facebookEvent): void
    {
        $this->facebookEvent = $facebookEvent;
    }

    /**
     * Return the Twitter link
     *
     * @return string
     */
    public function getTwitter(): string
    {
        return $this->twitter;
    }

    /**
     * Set the Twitter link
     *
     * @param string $twitter
     */
    public function setTwitter(string $twitter): void
    {
        $this->twitter = $twitter;
    }

    /**
     * Return the Xing event link
     *
     * @return string
     */
    public function getXingEvent(): string
    {
        return $this->xingEvent;
    }

    /**
     * Set the Xing event link
     *
     * @param string $xingEvent
     */
    public function setXingEvent(string $xingEvent): void
    {
        $this->xingEvent = $xingEvent;
    }

    /**
     * Return the live stream embed link
     * @return string
     */
    public function getLivestreamEmbed(): string
    {
        return $this->livestreamEmbed;
    }

    /**
     * Set the live stream embed link
     *
     * @param string $livestreamEmbed
     */
    public function setLivestreamEmbed(string $livestreamEmbed): void
    {
        $this->livestreamEmbed = $livestreamEmbed;
    }

    /**
     * Return the live stream link
     *
     * @return string
     */
    public function getLivestream(): string
    {
        return $this->livestream;
    }

    /**
     * Set the live stream link
     *
     * @param string $livestream
     */
    public function setLivestream(string $livestream): void
    {
        $this->livestream = $livestream;
    }

    /**
     * Return the ticket url
     *
     * @return string
     */
    public function getTicketUrl(): string
    {
        return $this->ticketUrl;
    }

    /**
     * Set the ticket url
     *
     * @param string $ticketUrl
     */
    public function setTicketUrl(string $ticketUrl): void
    {
        $this->ticketUrl = $ticketUrl;
    }

    /**
     * Return the website link
     *
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * Set the website link
     *
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }
}
