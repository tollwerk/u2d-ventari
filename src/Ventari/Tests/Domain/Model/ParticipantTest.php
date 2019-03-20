<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\Participant;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class ParticipantTest extends AbstractTestBase
{
    /**
     * Test participant
     *
     * @param $property
     * @param $value
     *
     * @dataProvider getParticipantData
     */
    public function testParticipant($property, $value): void
    {
        $participant = new Participant();

        $setter = 'set'.ucfirst($property);
        $getter = 'get'.ucfirst($property);

        $participant->$setter($value);
        $this->assertEquals($value, $participant->$getter());
    }

    public function getParticipantData(): array
    {
        return [
            ['personId', 123],
            ['email', 'email@server.net']
        ];
    }
}
