<?php

namespace Tollwerk\Ventari\Domain\Model\Traits;

/**
 * Trait EventContactTrait
 * @package Tollwerk\Ventari\Domain\Model\Traits
 */
trait EventContactTrait
{
    /**
     * @var string
     */
    protected $organizerEmail = '';

    /**
     * @var string
     */
    protected $organizerFacebook = '';

    /**
     * @var string
     */
    protected $organizerInstagram = '';

    /**
     * @var string
     */
    protected $organizerOtherLink = '';

    /**
     * @var string
     */
    protected $organizerWebsite = '';

    /**
     * @var string
     */
    protected $organizerLogo = '';

    /**
     * @var string
     */
    protected $organizerName = '';

    /**
     * @var string
     */
    protected $organizerTwitter = '';

    /**
     * @return string
     */
    public function getOrganizerEmail(): string
    {
        return $this->organizerEmail;
    }

    /**
     * @param string $organizerEmail
     */
    public function setOrganizerEmail(string $organizerEmail): void
    {
        $this->organizerEmail = $organizerEmail;
    }

    /**
     * @return string
     */
    public function getOrganizerFacebook(): string
    {
        return $this->organizerFacebook;
    }

    /**
     * @param string $organizerFacebook
     */
    public function setOrganizerFacebook(string $organizerFacebook): void
    {
        $this->organizerFacebook = $organizerFacebook;
    }

    /**
     * @return string
     */
    public function getOrganizerInstagram(): string
    {
        return $this->organizerInstagram;
    }

    /**
     * @param string $organizerInstagram
     */
    public function setOrganizerInstagram(string $organizerInstagram): void
    {
        $this->organizerInstagram = $organizerInstagram;
    }

    /**
     * @return string
     */
    public function getOrganizerOtherLink(): string
    {
        return $this->organizerOtherLink;
    }

    /**
     * @param string $organizerOtherLink
     */
    public function setOrganizerOtherLink(string $organizerOtherLink): void
    {
        $this->organizerOtherLink = $organizerOtherLink;
    }

    /**
     * @return string
     */
    public function getOrganizerWebsite(): string
    {
        return $this->organizerWebsite;
    }

    /**
     * @param string $organizerWebsite
     */
    public function setOrganizerWebsite(string $organizerWebsite): void
    {
        $this->organizerWebsite = $organizerWebsite;
    }

    /**
     * @return string
     */
    public function getOrganizerLogo(): string
    {
        return $this->organizerLogo;
    }

    /**
     * @param string $organizerLogo
     */
    public function setOrganizerLogo(string $organizerLogo): void
    {
        $this->organizerLogo = $organizerLogo;
    }

    /**
     * @return string
     */
    public function getOrganizerName(): string
    {
        return $this->organizerName;
    }

    /**
     * @param string $organizerName
     */
    public function setOrganizerName(string $organizerName): void
    {
        $this->organizerName = $organizerName;
    }

    /**
     * @return string
     */
    public function getOrganizerTwitter(): string
    {
        return $this->organizerTwitter;
    }

    /**
     * @param string $organizerTwitter
     */
    public function setOrganizerTwitter(string $organizerTwitter): void
    {
        $this->organizerTwitter = $organizerTwitter;
    }

    abstract public function abstractMethod(): string;
}
