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
     * @var string
     */
    protected $streetAddress;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var int
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $locality;

    /**
     * @var string
     */
    protected $fax;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var int
     */
    protected $companyId;
    /**
     * @var int
     */
    protected $longitude;
    /**
     * @var int
     */
    protected $latitude;

    /**
     * @return string
     */
    public function getStreetAddress(): string
    {
        return $this->streetAddress;
    }

    /**
     * @param string $streetAddress
     */
    public function setStreetAddress(string $streetAddress): void
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getPostalCode(): int
    {
        return $this->postalCode;
    }

    /**
     * @param int $postalCode
     */
    public function setPostalCode(int $postalCode): void
    {
        $this->postalCode = $postalCode;
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
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax(string $fax): void
    {
        $this->fax = $fax;
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
     * @param int $companyId
     */
    public function setCompanyId(int $companyId): void
    {
        $this->companyId = $companyId;
    }

    /**
     * @param int $longitude
     */
    public function setLongitude(int $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @param int $latitude
     */
    public function setLatitude(int $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function abstractMethod(): string
    {
        // TODO: Implement abstractMethod() method.
    }

}
