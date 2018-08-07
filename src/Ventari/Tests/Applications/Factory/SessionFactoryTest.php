<?php

namespace Tollwerk\Ventari\Tests\Applications\Factory;

use Tollwerk\Ventari\Application\Factory\SessionFactory;
use Tollwerk\Ventari\Domain\Model\Session;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class SessionFactoryTest extends AbstractTestBase
{
    /**
     * @var SessionFactory $testClass
     */
    public static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = new SessionFactory();
    }

    /**
     * Test the Instance of SessionFactory
     */
    public function testConstructor()
    {
        $this->assertInstanceOf(SessionFactory::class, self::$testClass);
    }

    /**
     * Test createFromJson
     *
     * @dataProvider jsonInputProvider
     */
    public function testCreateFromJson($input)
    {
        $actual = self::$testClass->createFromJson($input);
        $this->assertInstanceOf(Session::class, $actual);
    }

    public function jsonInputProvider()
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
