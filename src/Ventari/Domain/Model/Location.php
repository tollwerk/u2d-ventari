<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\LocationInterface;
use Tollwerk\Ventari\Domain\Model\Traits\CommonIntegerTrait;

/**
 * Class Location
 * @package Tollwerk\Ventari\Domain\Model
 */
class Location extends AbstractModel implements LocationInterface
{
    /**
     * Use traits
     */
    use CommonIntegerTrait;

    /**
     * @var string $locationAddress
     */
    protected $locationAddress;

    /**
     * @var string $locationTelephone
     */
    protected $locationTelephone;

    /**
     * @var int $locationZip
     */
    protected $locationZip;

    /**
     * @var string $locationName
     */
    protected $locationName;

    /**
     * @var string $locationCity
     */
    protected $locationCity;

    /**
     * @var string $locationFax
     */
    protected $locationFax;

    /**
     * @var string $locationEmail
     */
    protected $locationEmail;

    /**
     * @return string
     */
    public function getLocationAddress(): string
    {
        return $this->locationAddress;
    }

    /**
     * @param string $locationAddress
     */
    public function setLocationAddress(string $locationAddress): void
    {
        $this->locationAddress = $locationAddress;
    }

    /**
     * @return string
     */
    public function getLocationTelephone(): string
    {
        return $this->locationTelephone;
    }

    /**
     * @param string $locationTelephone
     */
    public function setLocationTelephone(string $locationTelephone): void
    {
        $this->locationTelephone = $locationTelephone;
    }

    /**
     * @return int
     */
    public function getLocationZip(): int
    {
        return $this->locationZip;
    }

    /**
     * @param int $locationZip
     */
    public function setLocationZip(int $locationZip): void
    {
        $this->locationZip = $locationZip;
    }

    /**
     * @return string
     */
    public function getLocationName(): string
    {
        return $this->locationName;
    }

    /**
     * @param string $locationName
     */
    public function setLocationName(string $locationName): void
    {
        $this->locationName = $locationName;
    }

    /**
     * @return string
     */
    public function getLocationCity(): string
    {
        return $this->locationCity;
    }

    /**
     * @param string $locationCity
     */
    public function setLocationCity(string $locationCity): void
    {
        $this->locationCity = $locationCity;
    }

    /**
     * @return string
     */
    public function getLocationFax(): string
    {
        return $this->locationFax;
    }

    /**
     * @param string $locationFax
     */
    public function setLocationFax(string $locationFax): void
    {
        $this->locationFax = $locationFax;
    }

    /**
     * @return string
     */
    public function getLocationEmail(): string
    {
        return $this->locationEmail;
    }

    /**
     * @param string $locationEmail
     */
    public function setLocationEmail(string $locationEmail): void
    {
        $this->locationEmail = $locationEmail;
    }

    public function abstractMethod(): string
    {
        // TODO: Implement abstractMethod() method.
    }

}
