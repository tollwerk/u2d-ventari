<?php

namespace Tollwerk\Ventari\Tests\Domain\Model\Traits;

use Tollwerk\Ventari\Domain\Model\Traits\SessionCategoryTrait;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class SessionCategoryTraitTest
 * @package Tollwerk\Ventari\Tests\Domain\Model\Traits
 */
class SessionCategoryTraitTest extends AbstractTestBase
{
    public $testTrait;

    protected function setUp()
    {
        $this->testTrait = $this->getMockForTrait(SessionCategoryTrait::class);
    }

    public function testCategoryColor(): void
    {
        $expectedString = '#EEE8AA';
        $mock           = $this->testTrait;
        $mock->setCategoryColor($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getCategoryColor());
    }

    public function testCategoryId(): void
    {
        $expectedValue = 112358;
        $mock          = $this->testTrait;
        $mock->setCategoryId($expectedValue);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $mock->getCategoryId());
    }

    public function testCategoryName(): void
    {
        $expectedString = 'Introduction';
        $mock           = $this->testTrait;
        $mock->setCategoryName($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getCategoryName());
    }
}
