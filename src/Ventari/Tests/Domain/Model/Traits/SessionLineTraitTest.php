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

    protected function setUp()
    {
        $this->testTrait = $this->getMockForTrait(SessionLineTrait::class);
    }

    public function testSessionLineId(): void
    {
        $expectedValue = 112358;
        $mock           = $this->testTrait;
        $mock->setSessionLineId($expectedValue);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $mock->getSessionLineId());
    }

    public function testSessionLineName(): void
    {
        $expectedString = 'Gallery 3';
        $mock           = $this->testTrait;
        $mock->setSessionLineName($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getSessionLineName());
    }
}
