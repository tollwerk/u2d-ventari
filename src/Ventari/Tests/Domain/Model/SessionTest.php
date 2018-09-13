<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Application\Factory\SessionFactory;
use Tollwerk\Ventari\Domain\Model\Session;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class SessionTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class SessionTest extends AbstractTestBase
{
    /**
     * @var array
     */
    public $sessionApi;

    protected function setUp()
    {
        $factory          = new SessionFactory();
        $this->sessionApi = $factory->accessSessionApi();
    }

    /**
     * Test Class Properties
     *
     * @param $input
     *
     * @dataProvider jsonInputProvider
     */
    public function testClass($input): void
    {
        $testClass = new Session();
        $factory = new SessionFactory();

        foreach ($input as $key => $value){
            if (isset($this->sessionApi[$key])) {
                $property = $this->sessionApi[$key];
            } else {
                $property = $this->sessionApi['sessionName'];
            }
            $this->assertClassHasAttribute($property, Session::class);

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
                    'sessionRemark'        => '',
                    'rowNum'               => 2,
                    'sessionId'            => 535,
                    'sessionCategoryColor' => '#EEE8AA',
                    'sessionName'          => 'Musterevent NUEWW',
                    'eventId'              => 1802,
                    'sessionCategoryId'    => 1,
                    'sessionCategoryName'  => 'Programmpunkt',
                    'sessionLineName'      => 'Schiene 1',
                    'sessionEnd'           => 'October, 12 2018 17:30:00',
                    'sessionLineId'        => 2,
                    'sessionRoom'          => '',
                    'sessionStart'         => 'October, 12 2018 09:00:00'
                )
            ]
        ];
    }
}
