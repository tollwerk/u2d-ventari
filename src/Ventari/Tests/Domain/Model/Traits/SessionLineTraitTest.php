<?php

namespace Tollwerk\Ventari\Tests\Domain\Model\Traits;

use Tollwerk\Ventari\Domain\Model\Traits\SessionLineTrait;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class SessionLineTraitTest
 * @package Tollwerk\Ventari\Tests\Domain\Model\Traits
 */
class SessionLineTraitTest extends AbstractTestBase
{
    public $testTrait;

    public function testLineId(): void
    {
        $expectedValue = 112358;
        $mock           = $this->getMockForTrait(SessionLineTrait::class);
        $mock->setLineId($expectedValue);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $mock->getLineId());
    }

    public function testLineName(): void
    {
        $expectedString = 'Gallery 3';
        $mock           = $this->getMockForTrait(SessionLineTrait::class);
        $mock->setLineName($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getLineName());
    }
}
