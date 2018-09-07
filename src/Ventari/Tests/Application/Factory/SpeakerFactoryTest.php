<?php

namespace Tollwerk\Ventari\Tests\Applications\Factory;

use Tollwerk\Ventari\Application\Factory\SpeakerFactory;
use Tollwerk\Ventari\Domain\Model\Speaker;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class SpeakerFactoryTest extends AbstractTestBase
{
    /**
     * @var SpeakerFactory $testClass
     */
    public static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = new SpeakerFactory();
    }

    /**
     * Test the Instance of SpeakerFactory
     */
    public function testConstructor(): void
    {
        $this->assertInstanceOf(SpeakerFactory::class, self::$testClass);
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
        $actual = self::$testClass->createFromJson($input);
        $this->assertInstanceOf(Speaker::class, $actual);
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
        foreach ($input as $key => $value){
            $actual = self::$testClass->accessRefineValue($key, $value);
            $this->assertEquals($value, $actual);
        }
    }

    public function jsonInputProvider(): array
    {
        return [
            [
                array(
                    'position'   => "Position",
                    'speakerId'  => 175,
                    'salutation' => "Herr",
                    'lastname'   => "Mustermann",
                    'eventId'    => 1801,
                    'title'      => "Dr.",
                    'firstname'  => "Max",
                    'photo'      => 1,
                    'remark'     => "Bemerkung",
                    'type'       => "Referent",
                    'company'    => "u2d"
                )
            ]
        ];
    }

}
