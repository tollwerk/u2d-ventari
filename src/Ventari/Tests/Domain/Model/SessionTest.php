<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\Session;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class SessionTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class SessionTest extends AbstractTestBase
{
    /**
     * Test Session
     *
     * @param $property
     * @param $value
     *
     * @dataProvider getSessionData
     * @throws \Exception
     */
    public function testSession($property, $value): void
    {
        $session = new Session();

        $setter = 'set'.ucfirst($property);
        $getter = 'get'.ucfirst($property);

        $session->$setter($value);
        $this->assertEquals($value, $session->$getter());
    }

    public function getSessionData(): array
    {
        return [
            /* Common integer trait */
            ['eventVentariId', 0],

            /* Session category trait */
            ['categoryColor', ''],
            ['categoryId', 0],
            ['categoryName', ''],

            /* Session line trait */
            ['lineId', 0],
            ['lineName', ''],

            /* Model specific properties */
            ['name', ''],
            ['remark', ''],
            ['startDateTime', new \DateTime('@0')],
            ['endDateTime', new \DateTime('@0')],
            ['room', '']
        ];
    }
}
