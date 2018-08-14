<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\SpeakerInterface;
use Tollwerk\Ventari\Domain\Model\Traits\CommonIntegerTrait;

class Speaker extends AbstractModel implements SpeakerInterface
{
    /**
     * Use traits
     */
    use CommonIntegerTrait;

    /**
     * @var string
     */
    protected $organization = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $givenName = '';

    /**
     * @var string
     */
    protected $familyName = '';

    /**
     * @var bool
     */
    protected $photo = false;

    /**
     * @var string
     */
    protected $role = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var string
     */
    protected $gender = '';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @return string
     */
    public function getOrganization(): string
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization(string $organization): void
    {
        $this->organization = $organization;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getGivenName(): string
    {
        return $this->givenName;
    }

    /**
     * @param string $givenName
     */
    public function setGivenName(string $givenName): void
    {
        $this->givenName = $givenName;
    }

    /**
     * @return string
     */
    public function getFamilyName(): string
    {
        return $this->familyName;
    }

    /**
     * @param string $familyName
     */
    public function setFamilyName(string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * @return bool
     */
    public function hasPhoto(): bool
    {
        return $this->photo;
    }

    /**
     * @param bool $photo
     */
    public function setPhoto(bool $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
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
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function abstractMethod(): void
    {
        // TODO: Ignore this method. It's used for testing purposes
    }
}
