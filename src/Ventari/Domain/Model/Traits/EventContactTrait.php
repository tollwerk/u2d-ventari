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
    protected $eventContactEmail;

    /**
     * @var string
     */
    protected $eventContactFacebook;

    /**
     * @var string
     */
    protected $eventContactInstagram;

    /**
     * @var string
     */
    protected $eventContactLinks;

    /**
     * @var string
     */
    protected $eventContactLogo;

    /**
     * @var string
     */
    protected $eventContactName;

    /**
     * @var string
     */
    protected $eventContactTwitterHandle;

    /**
     * @return string
     */
    public function getEventContactEmail(): string
    {
        return $this->eventContactEmail;
    }

    /**
     * @param string $eventContactEmail
     */
    public function setEventContactEmail(string $eventContactEmail): void
    {
        $this->eventContactEmail = $eventContactEmail;
    }

    /**
     * @return string
     */
    public function getEventContactFacebook(): string
    {
        return $this->eventContactFacebook;
    }

    /**
     * @param string $eventContactFacebook
     */
    public function setEventContactFacebook(string $eventContactFacebook): void
    {
        $this->eventContactFacebook = $eventContactFacebook;
    }

    /**
     * @return string
     */
    public function getEventContactInstagram(): string
    {
        return $this->eventContactInstagram;
    }

    /**
     * @param string $eventContactInstagram
     */
    public function setEventContactInstagram(string $eventContactInstagram): void
    {
        $this->eventContactInstagram = $eventContactInstagram;
    }

    /**
     * @return string
     */
    public function getEventContactLinks(): string
    {
        return $this->eventContactLinks;
    }

    /**
     * @param string $eventContactLinks
     */
    public function setEventContactLinks(string $eventContactLinks): void
    {
        $this->eventContactLinks = $eventContactLinks;
    }

    /**
     * @return string
     */
    public function getEventContactLogo(): string
    {
        return $this->eventContactLogo;
    }

    /**
     * @param string $eventContactLogo
     */
    public function setEventContactLogo(string $eventContactLogo): void
    {
        $this->eventContactLogo = $eventContactLogo;
    }

    /**
     * @return string
     */
    public function getEventContactName(): string
    {
        return $this->eventContactName;
    }

    /**
     * @param string $eventContactName
     */
    public function setEventContactName(string $eventContactName): void
    {
        $this->eventContactName = $eventContactName;
    }

    /**
     * @return string
     */
    public function getEventContactTwitterHandle(): string
    {
        return $this->eventContactTwitterHandle;
    }

    /**
     * @param string $eventContactTwitterHandle
     */
    public function setEventContactTwitterHandle(string $eventContactTwitterHandle): void
    {
        $this->eventContactTwitterHandle = $eventContactTwitterHandle;
    }

    abstract public function abstractMethod(): string;
}
