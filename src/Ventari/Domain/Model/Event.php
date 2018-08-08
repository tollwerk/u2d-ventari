<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\EventInterface;
use Tollwerk\Ventari\Domain\Model\Traits\EventContactTrait;
use Tollwerk\Ventari\Domain\Model\Traits\EventDateTrait;
use Tollwerk\Ventari\Domain\Model\Traits\EventLinkTrait;

/**
 * Class Event
 * @package Tollwerk\Ventari\Domain\Model
 */
class Event extends AbstractModel implements EventInterface
{
    /**
     * Use traits
     */
    use EventContactTrait, EventDateTrait, EventLinkTrait;

    /**
     * @var string
     */
    protected $ventariCategories;

    /**
     * @var boolean
     */
    protected $chargeable;

    /**
     * @var string
     */
    protected $locality;

    /**
     * @var string
     */
    protected $ticketDescription;

    /**
     * @var string
     */
    protected $ticketPrice;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $summary;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $level;

    /**
     * @var int
     */
    protected $maxParticipants;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $tags;

    /**
     * @var string
     */
    protected $presentationLanguage;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $targetgroup;

    /**
     * @var string
     */
    protected $tracks;

    /**
     * @var string
     */
    protected $registration;

    /**
     * @return string
     */
    public function getVentariCategories(): string
    {
        return $this->ventariCategories;
    }

    /**
     * @param string $ventariCategories
     */
    public function setVentariCategories(string $ventariCategories): void
    {
        $this->ventariCategories = $ventariCategories;
    }

    /**
     * @return bool
     */
    public function isChargeable(): bool
    {
        return $this->chargeable;
    }

    /**
     * @param bool $chargeable
     */
    public function setChargeable(bool $chargeable): void
    {
        $this->chargeable = $chargeable;
    }

    /**
     * @return string
     */
    public function getLocality(): string
    {
        return $this->locality;
    }

    /**
     * @param string $locality
     */
    public function setLocality(string $locality): void
    {
        $this->locality = $locality;
    }

    /**
     * @return string
     */
    public function getTicketDescription(): string
    {
        return $this->ticketDescription;
    }

    /**
     * @param string $ticketDescription
     */
    public function setTicketDescription(string $ticketDescription): void
    {
        $this->ticketDescription = $ticketDescription;
    }

    /**
     * @return string
     */
    public function getTicketPrice(): string
    {
        return $this->ticketPrice;
    }

    /**
     * @param string $ticketPrice
     */
    public function setTicketPrice(string $ticketPrice): void
    {
        $this->ticketPrice = $ticketPrice;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @param string $level
     */
    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getMaxParticipants(): int
    {
        return $this->maxParticipants;
    }

    /**
     * @param int $maxParticipants
     */
    public function setMaxParticipants(int $maxParticipants): void
    {
        $this->maxParticipants = $maxParticipants;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     */
    public function setTags(string $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getPresentationLanguage(): string
    {
        return $this->presentationLanguage;
    }

    /**
     * @param string $presentationLanguage
     */
    public function setPresentationLanguage(string $presentationLanguage): void
    {
        $this->presentationLanguage = $presentationLanguage;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getTargetgroup(): string
    {
        return $this->targetgroup;
    }

    /**
     * @param string $targetgroup
     */
    public function setTargetgroup(string $targetgroup): void
    {
        $this->targetgroup = $targetgroup;
    }

    /**
     * @return string
     */
    public function getTracks(): string
    {
        return $this->tracks;
    }

    /**
     * @param string $tracks
     */
    public function setTracks(string $tracks): void
    {
        $this->tracks = $tracks;
    }

    /**
     * @return string
     */
    public function getRegistration(): string
    {
        return $this->registration;
    }

    /**
     * @param string $registration
     */
    public function setRegistration(string $registration): void
    {
        $this->registration = $registration;
    }

    public function abstractMethod(): string
    {
        // TODO: Implement abstractMethod() method.
    }

    public function abstractMethodForDate(): \DateTimeImmutable
    {
        // TODO: Implement abstractMethodForDate() method.
    }
}
