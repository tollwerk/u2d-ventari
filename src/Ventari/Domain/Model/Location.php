<?php

namespace Tollwerk\Ventari\Domain\Model;

/**
 * Class Location
 * @package Tollwerk\Ventari\Domain\Model
 */
class Location extends AbstractModel
{
    /**
     * @var int $hotelId
     */
    protected $hotelId;

    /**
     * @var string $hotelAddress
     */
    protected $hotelAddress;

    /**
     * @var string $hotelTelephone
     */
    protected $hotelTelephone;

    /**
     * @var int $rowNum
     */
    protected $rowNum;

    /**
     * @var int $hotelZip
     */
    protected $hotelZip;

    /**
     * @var string $hotelName
     */
    protected $hotelName;

    /**
     * @var int $eventId
     */
    protected $eventId;

    /**
     * @var string $hotelCity
     */
    protected $hotelCity;

    /**
     * @var string $hotelFax
     */
    protected $hotelFax;

    /**
     * @var string $hotelEmail
     */
    protected $hotelEmail;

    /**
     * @return int
     */
    public function getHotelId(): int
    {
        return $this->hotelId;
    }

    /**
     * @param int $hotelId
     */
    public function setHotelId(int $hotelId): void
    {
        $this->hotelId = $hotelId;
    }

    /**
     * @return string
     */
    public function getHotelAddress(): string
    {
        return $this->hotelAddress;
    }

    /**
     * @param string $hotelAddress
     */
    public function setHotelAddress(string $hotelAddress): void
    {
        $this->hotelAddress = $hotelAddress;
    }

    /**
     * @return string
     */
    public function getHotelTelephone(): string
    {
        return $this->hotelTelephone;
    }

    /**
     * @param string $hotelTelephone
     */
    public function setHotelTelephone(string $hotelTelephone): void
    {
        $this->hotelTelephone = $hotelTelephone;
    }

    /**
     * @return int
     */
    public function getRowNum(): int
    {
        return $this->rowNum;
    }

    /**
     * @param int $rowNum
     */
    public function setRowNum(int $rowNum): void
    {
        $this->rowNum = $rowNum;
    }

    /**
     * @return int
     */
    public function getHotelZip(): int
    {
        return $this->hotelZip;
    }

    /**
     * @param int $hotelZip
     */
    public function setHotelZip(int $hotelZip): void
    {
        $this->hotelZip = $hotelZip;
    }

    /**
     * @return string
     */
    public function getHotelName(): string
    {
        return $this->hotelName;
    }

    /**
     * @param string $hotelName
     */
    public function setHotelName(string $hotelName): void
    {
        $this->hotelName = $hotelName;
    }

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
    }

    /**
     * @param int $eventId
     */
    public function setEventId(int $eventId): void
    {
        $this->eventId = $eventId;
    }

    /**
     * @return string
     */
    public function getHotelCity(): string
    {
        return $this->hotelCity;
    }

    /**
     * @param string $hotelCity
     */
    public function setHotelCity(string $hotelCity): void
    {
        $this->hotelCity = $hotelCity;
    }

    /**
     * @return string
     */
    public function getHotelFax(): string
    {
        return $this->hotelFax;
    }

    /**
     * @param string $hotelFax
     */
    public function setHotelFax(string $hotelFax): void
    {
        $this->hotelFax = $hotelFax;
    }

    /**
     * @return string
     */
    public function getHotelEmail(): string
    {
        return $this->hotelEmail;
    }

    /**
     * @param string $hotelEmail
     */
    public function setHotelEmail(string $hotelEmail): void
    {
        $this->hotelEmail = $hotelEmail;
    }
}
