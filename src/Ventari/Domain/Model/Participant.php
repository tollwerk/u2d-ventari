<?php

namespace Tollwerk\Ventari\Domain\Model;

/**
 * Class Participant
 * @package Tollwerk\Ventari\Domain\Model
 */
class Participant extends AbstractModel
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var array
     */
    protected $companions;

    /**
     * @var array
     */
    protected $uploads;

    /***************************************************************
     * GET Functions
     **************************************************************/
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return array
     */
    public function getCompanions()
    {
        return $this->companions;
    }

    /**
     * @return array
     */
    public function getUploads()
    {
        return $this->uploads;
    }

    /***************************************************************
     * SET Functions
     **************************************************************/
    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param $participant
     * @return array
     */
    public function addCompanion($participant)
    {
        array_push($this->companions, $participant);
        return $this->companions;
    }

    /**
     * @param $upload
     * @return array
     */
    public function addUpload($upload)
    {
        array_push($this->uploads, $upload);
        return $this->uploads;
    }
}
