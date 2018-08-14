<?php

namespace Tollwerk\Ventari\Domain\Model;

use Tollwerk\Ventari\Domain\Contract\ParticipantInterface;

class Participant extends AbstractModel implements ParticipantInterface
{

    protected $personId;

    protected $rowNum;

    protected $parentParticipantId;

    protected $createDate;

    protected $eventId;

    protected $hash;

    protected $status;

    protected $groupId;

    protected $languageId;

    protected $lastModified;

    protected $originId;

    protected $id;

    protected $createdBy;

    protected $changedBy;
}