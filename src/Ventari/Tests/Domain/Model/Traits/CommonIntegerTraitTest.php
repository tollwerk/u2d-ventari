<?php

namespace Tollwerk\Ventari\Tests\Domain\Model\Traits;

use Tollwerk\Ventari\Domain\Model\Traits\CommonIntegerTrait;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class CommonIntegerTraitTest
 * @package Tollwerk\Ventari\Tests\Domain\Model\Traits
 */
class CommonIntegerTraitTest extends AbstractTestBase
{
    public $testTrait;

    protected function setUp()
    {
        $this->testTrait = $this->getMockForTrait(CommonIntegerTrait::class);
    }

    public function testEventVentariId(): void
    {
        $expectedValue = 112358;
        $mock           = $this->testTrait;
        $mock->setEventVentariId($expectedValue);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $mock->getEventVentariId());
    }
}
