<?php

/**
 * u2d-ventari
 *
 * @category   Tollwerk
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Domain\Model
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

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\LocationInterface;
use Tollwerk\Ventari\Domain\Model\Traits\CommonIntegerTrait;

/**
 * Location
 *
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Domain\Model
 */
class Location extends AbstractModel implements LocationInterface
{
    /**
     * Use traits
     */
    use CommonIntegerTrait;


    /**
     * Street address
     *
     * @var string
     */
    protected $streetAddress = '';

    /**
     * Phone
     *
     * @var string
     */
    protected $phone = '';

    /**
     * Postal code
     *
     * @var int
     */
    protected $postalCode = null;

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Locality
     *
     * @var string
     */
    protected $locality = '';

    /**
     * Room
     *
     *
     * @var string
     */
    protected $room = '';

    /**
     * Fax
     *
     * @var string
     */
    protected $fax = '';

    /**
     * Email
     *
     * @var string
     */
    protected $email = '';

    /**
     * Company Id
     *
     * @var int
     */
    protected $companyId = null;

    /**
     * Longitude
     *
     * @var float
     */
    protected $longitude = null;

    /**
     * Latitude
     *
     * @var float
     */
    protected $latitude = null;

    /**
     * Return the street address
     *
     * @return string
     */
    public function getStreetAddress(): string
    {
        return $this->streetAddress;
    }

    /**
     * Set the street address
     * @param string $streetAddress
     */
    public function setStreetAddress(string $streetAddress): void
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * Return the phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Set the phone
     *
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Return the postal code
     *
     * @return int
     */
    public function getPostalCode(): int
    {
        return $this->postalCode;
    }

    /**
     * Set the postal code
     *
     * @param int $postalCode
     */
    public function setPostalCode(int $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Return the name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the name
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Return the locality
     *
     * @return string
     */
    public function getLocality(): string
    {
        return $this->locality;
    }

    /**
     * Set the locality
     *
     * @param string $locality
     */
    public function setLocality(string $locality): void
    {
        $this->locality = $locality;
    }

    /**
     * Return the room
     *
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * Set the room
     *
     * @param string $room
     */
    public function setRoom(string $room): void
    {
        $this->room = $room;
    }

    /**
     * Return the fax
     *
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * Set the fax
     *
     * @param string $fax
     */
    public function setFax(string $fax): void
    {
        $this->fax = $fax;
    }

    /**
     * Return the email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the email
     *
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Return the company id
     *
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    /**
     * Set the company id
     *
     * @param int $companyId
     */
    public function setCompanyId(int $companyId): void
    {
        $this->companyId = $companyId;
    }

    /**
     * Return the longitude
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Set the longitude
     *
     * @param float $longitude
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * Return the latitude
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Set the latitude
     *
     * @param float $latitude
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }
}
