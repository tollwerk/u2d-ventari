<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\AbstractModel;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class AbstractModelTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class AbstractModelTest extends AbstractTestBase
{
    public $testClass;

    protected function setUp()
    {
        $this->testClass = $this->getMockForAbstractClass(AbstractModel::class);
    }

    public function testId(): void
    {
        $expectedValue = 1235813;
        $this->testClass->setId($expectedValue);
        $this->assertEquals($expectedValue, $this->testClass->getId());
    }
    public function testActive(): void
    {
        $expectedValue = false;
        $this->testClass->setActive($expectedValue);
        $this->assertEquals($expectedValue, $this->testClass->isActive());
    }

}
