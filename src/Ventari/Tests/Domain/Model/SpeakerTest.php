<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\Speaker;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class SpeakerTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class SpeakerTest extends AbstractTestBase
{
    /**
     * Test Speaker
     *
     * @param $property
     * @param $value
     *
     * @dataProvider jsonInputProvider
     */
    public function testSpeaker($property, $value): void
    {
        $speaker = new Speaker();

        $setter = 'set'.ucfirst($property);
        $getter = ($property !== 'photo') ? 'get'.ucfirst($property) : 'has'.ucfirst($property);

        $speaker->$setter($value);
        $this->assertEquals($value, $speaker->$getter());
    }

    public function jsonInputProvider(): array
    {
        return [
            /* Common Integer Trait */
            ['eventVentariId', 0],

            /* Model specific properties */
            ['organization', ''],
            ['email', ''],
            ['givenName', ''],
            ['familyName', ''],
            ['photo', true],
            ['role', ''],
            ['description', ''],
            ['gender', ''],
            ['title', '']
        ];
    }
}
