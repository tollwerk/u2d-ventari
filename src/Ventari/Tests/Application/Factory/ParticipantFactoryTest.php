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

    public static function setUpBeforeClass()
    {
        self::$testClass = new ParticipantFactory();
    }

    public function testConstructor(): void
    {
        $this->assertInstanceOf(ParticipantFactory::class, self::$testClass);
    }

    /**
     * Test createFromJson
     *
     * @param $input
     *
     * @dataProvider jsonInputProvider
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
     * @dataProvider jsonInputProvider
     */
    public function testRefinedValue($input): void
    {
        foreach ($input as $key => $value) {
            $actual = self::$testClass->accessRefineValue($key, $value);
            $this->assertEquals($value, $actual);
        }
    }

    public function jsonInputProvider(): array
    {
        $fieldsData = new \stdClass();

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
