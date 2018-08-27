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
     * @var array
     */
    protected $ventariCategories = [];

    /**
     * @var boolean
     */
    protected $chargeable = false;

    /**
     * @var string
     */
    protected $locality = '';

    /**
     * @var string
     */
    protected $ticketDescription = '';

    /**
     * @var float
     */
    protected $ticketPrice = 0.0;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var string
     */
    protected $summary = '';

    /**
     * @var string
     */
    protected $image = '';

    /**
     * @var array
     */
    protected $level = [];

    /**
     * @var int
     */
    protected $maxParticipants = 0;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $tags = '';

    /**
     * @var array
     */
    protected $presentationLanguage = [];

    /**
     * @var int
     */
    protected $status = '';

    /**
     * @var array
     */
    protected $targetgroup = [];

    /**
     * @var array
     */
    protected $tracks = [];

    /**
     * @var string
     */
    protected $registration = '';

    /**
     * @return array
     */
    public function getVentariCategories(): array
    {
        return $this->ventariCategories;
    }

    /**
     * @param array $ventariCategories
     */
    public function setVentariCategories(array $ventariCategories): void
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
     * @return float
     */
    public function getTicketPrice(): float
    {
        return $this->ticketPrice;
    }

    /**
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
     * @return array
     */
    public function getLevel(): array
    {
        return $this->level;
    }

    /**
     * @param array $level
     */
    public function setLevel(array $level): void
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
     * @return array
     */
    public function getPresentationLanguage(): array
    {
        return $this->presentationLanguage;
    }

    /**
     * @param array $presentationLanguage
     */
    public function setPresentationLanguage(array $presentationLanguage): void
    {
        $this->presentationLanguage = $presentationLanguage;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = intval($status);
    }

    /**
     * @return array
     */
    public function getTargetgroup(): array
    {
        return $this->targetgroup;
    }

    /**
     * @param array $targetgroup
     */
    public function setTargetgroup(array $targetgroup): void
    {
        $this->targetgroup = $targetgroup;
    }

    /**
     * @return array
     */
    public function getTracks(): array
    {
        return $this->tracks;
    }

    /**
     * @param array $tracks
     */
    public function setTracks(array $tracks): void
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

    public function abstractMethodForDate(): \DateTime
    {
        // TODO: Implement abstractMethodForDate() method.
    }
}
