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
     * @var int
     */
    protected $sessionId;

    /**
     * @var string
     */
    protected $sessionName;

    /**
     * @var string
     */
    protected $sessionRemark;

    /**
     * TODO: Review and decide if we want to mainting a single format relationship with he rest service, Or are we just gonna ingest the string.
     * @var string
     */
    protected $sessionStart;

    /**
     * TODO: Ditto
     * @var string
     */
    protected $sessionEnd;

    /**
     * @return int
     */
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /**
     * @param int $sessionId
     */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

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
     * @return string
     */
    public function getSessionStart(): string
    {
        return $this->sessionStart;
    }

    /**
     * @param string $sessionStart
     */
    public function setSessionStart(string $sessionStart): void
    {
        $this->sessionStart = $sessionStart;
    }

    /**
     * @return string
     */
    public function getSessionEnd(): string
    {
        return $this->sessionEnd;
    }

    /**
     * @param string $sessionEnd
     */
    public function setSessionEnd(string $sessionEnd): void
    {
        $this->sessionEnd = $sessionEnd;
    }

    public function abstractMethod(): void
    {
        // TODO: Implement abstractMethod() method.
    }
}
