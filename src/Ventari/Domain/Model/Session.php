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
    protected $sessionName;

    /**
     * @var string
     */
    protected $sessionRemark;

    /**
     * @var \DateTimeImmutable
     */
    protected $sessionStart;

    /**
     * @var \DateTimeImmutable
     */
    protected $sessionEnd;

    /**
     * @return string
     */
    public function getSessionName(): string
    {
        return $this->sessionName;
    }

    /**
     * @param string $sessionName
     */
    public function setSessionName(string $sessionName): void
    {
        $this->sessionName = $sessionName;
    }

    /**
     * @return string
     */
    public function getSessionRemark(): string
    {
        return $this->sessionRemark;
    }

    /**
     * @param string $sessionRemark
     */
    public function setSessionRemark(string $sessionRemark): void
    {
        $this->sessionRemark = $sessionRemark;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getSessionStart(): \DateTimeImmutable
    {
        return $this->sessionStart;
    }

    /**
     * @param \DateTimeImmutable $sessionStart
     */
    public function setSessionStart(\DateTimeImmutable $sessionStart): void
    {
        $this->sessionStart = $sessionStart;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getSessionEnd(): \DateTimeImmutable
    {
        return $this->sessionEnd;
    }

    /**
     * @param \DateTimeImmutable $sessionEnd
     */
    public function setSessionEnd(\DateTimeImmutable $sessionEnd): void
    {
        $this->sessionEnd = $sessionEnd;
    }

    public function abstractMethod(): void
    {
        // TODO: Ignore this method. It's used for testing purposes
    }
}
