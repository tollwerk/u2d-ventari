<?php

namespace Tollwerk\Ventari\Tests\Infrastructure\Helper;

use Tollwerk\Ventari\Infrastructure\Helper\Helper;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class HelperTest extends AbstractTestBase
{
    /**
     * @var Helper $testClass
     */
    protected static $testClass;

    public static function setUpBeforeClass()
    {
        self::$testClass = new Helper();
    }

    public function testQueryBuilder(): void
    {
        $expected = 'filterActiveEvents=1&filterFields={"pa_email":"email@server.net"}';
        $actual   = self::$testClass::queryBuilder([
            'filterActiveEvents' => 1,
            'filterFields'       => [
                'pa_email' => 'email@server.net',
            ],
        ]);

        $this->assertEquals($expected, $actual);
    }

    public function testCreateFrontendLink(): void
    {
        $expected = '/tms/frontend/index.cfm?l=1123&amp;id=112&amp;sp_id=1&amp;dat_h=ASDFQWERZXCV';
        $actual   = self::$testClass::createFrontendLink(1123,112,'ASDFQWERZXCV',1);
        $this->assertEquals($expected, $actual);
    }

}
