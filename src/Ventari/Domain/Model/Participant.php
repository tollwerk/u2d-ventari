<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\ParticipantInterface;

class Participant extends AbstractModel implements ParticipantInterface
{
    /**
     * @var mixed
     */
    protected $personId = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param mixed $personId
     */
    public function setPersonId($personId): void
    {
        $this->personId = $personId;
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



    public function abstractMethod(): void
    {
        // TODO: Ignore this method. It's used for testing purposes
    }
}