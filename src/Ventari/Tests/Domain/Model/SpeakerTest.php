<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Application\Factory\SpeakerFactory;
use Tollwerk\Ventari\Domain\Model\Speaker;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class SpeakerTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class SpeakerTest extends AbstractTestBase
{
    public $speakerApi;

    /**
     * Test Class Properties
     *
     * @param $input
     *
     * @dataProvider jsonInputProvider
     */
    public function testClass($input): void
    {
        $testClass = new Speaker();
        $factory   = new SpeakerFactory();
        $this->speakerApi = $factory->accessSpeakerApi();

        foreach ($input as $key => $value) {
            if (isset($this->speakerApi[$key])) {
                $property = $this->speakerApi[$key];
            } else {
                $property = $this->speakerApi['position'];
            }
            $this->assertClassHasAttribute($property, Speaker::class);

            $setter = 'set'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $setter), $this->equalTo(true));

            $refinedValue = $factory->accessRefineValue($key, $value);
            $testClass->$setter($refinedValue);
            $getter = ($property !== 'photo') ? 'get'.ucfirst($property) : 'has'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $getter), $this->equalTo(true));
            $this->assertEquals($refinedValue, $testClass->$getter());
        }
    }

    public function jsonInputProvider(): array
    {
        return [
            [
                array(
                    'position'   => 'Position',
                    'speakerId'  => 175,
                    'salutation' => 'Herr',
                    'lastname'   => 'Mustermann',
                    'eventId'    => 1801,
                    'title'      => 'Dr.',
                    'firstname'  => 'Max',
                    'photo'      => 1,
                    'remark'     => 'Bemerkung',
                    'type'       => 'Referent',
                    'company'    => 'u2d',
                    'email'      => 'john@company.de'
                )
            ]
        ];
    }
}
