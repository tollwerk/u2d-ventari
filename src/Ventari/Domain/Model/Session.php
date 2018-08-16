<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\SessionInterface;
use Tollwerk\Ventari\Domain\Model\Traits\CommonIntegerTrait;
use Tollwerk\Ventari\Domain\Model\Traits\SessionCategoryTrait;
use Tollwerk\Ventari\Domain\Model\Traits\SessionLineTrait;

/**
 * Class Session
 * @package Tollwerk\Ventari\Domain\Model
 */
class Session extends AbstractModel implements SessionInterface
{
    /**
     * Use traits
     */
    use CommonIntegerTrait, SessionCategoryTrait, SessionLineTrait;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $remark = '';

    /**
     * @var \DateTime
     */
    protected $startDateTime;

    /**
     * @var \DateTime
     */
    protected $endDateTime;

    /**
     * @var string
     */
    protected $room = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $dateTimeZone = new \DateTimeZone('CET');
        $this->startDateTime = new \DateTime('@0');
        $this->startDateTime->setTimezone($dateTimeZone);
        $this->endDateTime   = new \DateTime('@0');
        $this->endDateTime->setTimezone($dateTimeZone);
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
    public function getRemark(): string
    {
        return $this->remark;
    }

    /**
     * @param string $remark
     */
    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }

    /**
     * @return \DateTime
     */
    public function getStartDateTime(): \DateTime
    {
        return $this->startDateTime;
    }

    /**
     * @param \DateTime $startDateTime
     */
    public function setStartDateTime(\DateTime $startDateTime): void
    {
        $this->startDateTime = $startDateTime;
    }

    /**
     * @return \DateTime
     */
    public function getEndDateTime(): \DateTime
    {
        return $this->endDateTime;
    }

    /**
     * @param \DateTime $endDateTime
     */
    public function setEndDateTime(\DateTime $endDateTime): void
    {
        $this->endDateTime = $endDateTime;
    }

    /**
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * @param string $room
     */
    public function setRoom(string $room): void
    {
        $this->room = $room;
    }

    public function abstractMethod(): void
    {
        // TODO: Ignore this method. It's used for testing purposes
    }
}
