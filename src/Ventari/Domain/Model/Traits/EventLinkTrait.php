<?php

namespace Tollwerk\Ventari\Domain\Model\Traits;

/**
 * Trait EventLinkTrait
 * @package Tollwerk\Ventari\Domain\Model\Traits
 */
trait EventLinkTrait
{
    /**
     * @var string
     */
    protected $facebookEvent = '';

    /**
     * @var string
     */
    protected $twitter = '';

    /**
     * @var string
     */
    protected $xingEvent = '';

    /**
     * @var string
     */
    protected $livestreamEmbed = '';

    /**
     * @var string
     */
    protected $livestream = '';

    /**
     * @var string
     */
    protected $ticketUrl = '';

    /**
     * @var string
     */
    protected $website = '';

    /**
     * @return string
     */
    public function getFacebookEvent(): string
    {
        return $this->facebookEvent;
    }

    /**
     * @param string $facebookEvent
     */
    public function setFacebookEvent(string $facebookEvent): void
    {
        $this->facebookEvent = $facebookEvent;
    }

    /**
     * @return string
     */
    public function getTwitter(): string
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter(string $twitter): void
    {
        $this->twitter = $twitter;
    }

    /**
     * @return string
     */
    public function getXingEvent(): string
    {
        return $this->xingEvent;
    }

    /**
     * @param string $xingEvent
     */
    public function setXingEvent(string $xingEvent): void
    {
        $this->xingEvent = $xingEvent;
    }

    /**
     * @return string
     */
    public function getLivestreamEmbed(): string
    {
        return $this->livestreamEmbed;
    }

    /**
     * @param string $livestreamEmbed
     */
    public function setLivestreamEmbed(string $livestreamEmbed): void
    {
        $this->livestreamEmbed = $livestreamEmbed;
    }

    /**
     * @return string
     */
    public function getLivestream(): string
    {
        return $this->livestream;
    }

    /**
     * @param string $livestream
     */
    public function setLivestream(string $livestream): void
    {
        $this->livestream = $livestream;
    }

    /**
     * @return string
     */
    public function getTicketUrl(): string
    {
        return $this->ticketUrl;
    }

    /**
     * @param string $ticketUrl
     */
    public function setTicketUrl(string $ticketUrl): void
    {
        $this->ticketUrl = $ticketUrl;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    abstract public function abstractMethod(): string;
}
