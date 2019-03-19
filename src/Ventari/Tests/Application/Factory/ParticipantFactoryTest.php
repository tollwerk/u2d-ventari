<?php

namespace Tollwerk\Ventari\Tests\Application\Factory;

use Tollwerk\Ventari\Application\Factory\ParticipantFactory;
use Tollwerk\Ventari\Domain\Model\Participant;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class ParticipantFactoryTest extends AbstractTestBase
{
    /**
     * @var ParticipantFactory $testClass
     */
    public static $testClass;

    /**
     * Test the constructor
     */
    public function testConstructor(): void
    {
        self::$testClass = new ParticipantFactory();
        $this->assertInstanceOf(ParticipantFactory::class, self::$testClass);
    }

    /**
     * Test createFromJson
     *
     * @param $input
     *
     * @depends testConstructor
     *
     * @dataProvider jsonInputProvider1
     * @throws \Exception
     */
    public function testCreateFromJson($input): void
    {
        $actual = self::$testClass::createFromJson($input);
        $this->assertInstanceOf(Participant::class, $actual);
    }

    /**
     * Test refineValue
     *
     * @param $input
     *
     * @depends testConstructor
     *
     * @dataProvider jsonInputProvider2
     */
    public function testRefinedValue($input): void
    {
        foreach ($input as $key => $value) {
            $actual = self::$testClass->accessRefineValue($key, $value);
            $this->assertEquals($value, $actual);
        }
    }

    public function jsonInputProvider1(): array
    {
        return [
            [
                array(
                    'personId' => 123,
                    'fields'   => array(
                        (object)array(
                            'anzParamId' => 7,
                            'value'      => 'email@server.net'
                        )
                    ),
                    'id'       => 5
                )
            ],[
                array(
                    'personId' => '',
                    'fields'   => array(
                        (object)array(
                            'anzParamId' => 7,
                            'value'      => 'email@server.net'
                        )
                    ),
                    'id'       => 5
                )
            ]
        ];
    }
    public function jsonInputProvider2(): array
    {
        return [
            [
                array(
                    'personId' => 123,
                    'fields'   => array(
                        (object)array(
                            'anzParamId' => 7,
                            'value'      => 'email@server.net'
                        )
                    ),
                    'id'       => 5
                )
            ]
        ];
    }
}
