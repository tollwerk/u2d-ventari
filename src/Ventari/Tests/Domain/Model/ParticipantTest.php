<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Application\Factory\ParticipantFactory;
use Tollwerk\Ventari\Domain\Model\Participant;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class ParticipantTest extends AbstractTestBase
{
    /**
     * @var array
     */
    public $participantApi;

    /**
     * Test Class Properties
     *
     * @param $input
     *
     * @dataProvider jsonInputProvider
     */
    public function testClass($input): void
    {
        $testClass = new Participant();
        $factory = new ParticipantFactory();
        $this->participantApi = $factory->accessParticipantApi();

        foreach ($input as $key => $value) {
            if (isset($this->participantApi[$key])) {
                $property = $this->participantApi[$key];
            }
            $this->assertClassHasAttribute($property, Participant::class);

            $setter = 'set'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $setter), $this->equalTo(true));
            $refinedValue = $factory->accessRefineValue($key, $value);
            $testClass->$setter($refinedValue);
            $getter = 'get'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $getter), $this->equalTo(true));
            $this->assertEquals($refinedValue, $testClass->$getter());
        }
    }

    public function jsonInputProvider(): array
    {
        return [
            [
                array(
                    'id' => 5,
                    'personId' => 123,
                    'email' => 'email@server.net'
                )
            ]
        ];
    }
}
