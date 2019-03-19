<?php

namespace Tollwerk\Ventari\Tests\Infrastructure\Helper;

use Tollwerk\Ventari\Infrastructure\Helper\Helper;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class HelperTest extends AbstractTestBase
{
    public function testQueryBuilder(): void
    {
        $testClass = new Helper();
        $expected = 'filterActiveEvents=1&filterFields={"pa_email":"email@server.net"}';
        $actual   = $testClass::queryBuilder([
            'filterActiveEvents' => 1,
            'filterFields'       => [
                'pa_email' => 'email@server.net',
            ],
        ]);

        $this->assertEquals($expected, $actual);
    }

    public function testCreateFrontendLink(): void
    {
        $testClass = new Helper();
        $expected = '/tms/frontend/index.cfm?l=1123&id=112&sp_id=1&dat_h=ASDFQWERZXCV';
        $actual   = $testClass::createFrontendLink(1123,112,'ASDFQWERZXCV',1);
        $this->assertEquals($expected, $actual);
    }

}
