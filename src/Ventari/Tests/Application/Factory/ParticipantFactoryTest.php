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
     * @depends      testConstructor
     *
     * @dataProvider getCreateFromJsonData
     * @throws \Exception
     */
    public function testCreateFromJson($input): void
    {
        $actual = self::$testClass::createFromJson([$input]);
        $this->assertInstanceOf(Participant::class, $actual);
    }

    public function getCreateFromJsonData(): array
    {
        return [
            [
                'personId' => 123,
                'fields'   => array(
                    (object)array(
                        'anzParamId' => 7,
                        'value'      => 'email@server.net'
                    )
                ),
                'id'       => 5
            ],
            [
                'personId' => '',
                'fields'   => array(
                    (object)array(
                        'anzParamId' => 7,
                        'value'      => 'email@server.net'
                    )
                ),
                'id'       => 5
            ]
        ];
    }
}
