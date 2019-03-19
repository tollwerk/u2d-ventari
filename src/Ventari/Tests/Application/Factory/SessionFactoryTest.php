<?php

namespace Tollwerk\Ventari\Tests\Applications\Factory;

use Tollwerk\Ventari\Application\Factory\SessionFactory;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class SessionFactoryTest extends AbstractTestBase
{
    /**
     * @var SessionFactory $testClass
     */
    public static $testClass;

    /**
     * Test the Instance of SessionFactory
     */
    public function testConstructor(): void
    {
        self::$testClass = new SessionFactory();
        $this->assertInstanceOf(SessionFactory::class, self::$testClass);
    }

    /**
     * @param $input
     *
     * @depends testConstructor
     *
     * @throws \Exception
     * @dataProvider jsonInputProvider
     */
    public function testCreateFromJson($input): void
    {
        $actual = self::$testClass::createFromJson($input);
        $this->assertObjectNotHasAttribute('$setter', $actual);
//        $this->assertInstanceOf(ModelInterface::class, $actual);
    }

    /**
     * @param $input
     *
     * @depends testConstructor
     *
     * @dataProvider jsonInputProvider
     */
    public function testRefineValue($input): void
    {
        foreach ($input as $key => $value) {
            $actual = self::$testClass->accessRefineValue($key, $value);

            if (\in_array($key, self::$testClass->accessDateProperties())) {
                $this->assertInstanceOf(\DateTime::class, $actual);
            }
        }
    }

    public function jsonInputProvider(): array
    {
        return [
            [
                array(
                    'sessionRemark'        => "",
                    'rowNum'               => 1,
                    'sessionId'            => 534,
                    'sessionCategoryColor' => "#EEE8AA",
                    'sessionName'          => "Musterevent NUEWW",
                    'eventId'              => 1801,
                    'sessionCategoryId'    => 1,
                    'sessionCategoryName'  => "Programmpunkt",
                    'sessionLineName'      => "Schiene 1",
                    'sessionEnd'           => "October, 22 2018 17:30:00",
                    'sessionSignposting'   => "",
                    'sessionLineId'        => 1,
                    'sessionStart'         => "October, 22 2018 09:00:00"
                )
            ]
        ];
    }
}
