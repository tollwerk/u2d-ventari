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

    public function testVentariId(): void
    {
        $this->testClass = $this->getMockForAbstractClass(AbstractModel::class);
        $expectedValue = 1235813;
        $this->testClass->setVentariId($expectedValue);
        $this->assertEquals($expectedValue, $this->testClass->getVentariId());
    }
    public function testHidden(): void
    {
        $this->testClass = $this->getMockForAbstractClass(AbstractModel::class);
        $expectedValue = false;
        $this->testClass->setHidden($expectedValue);
        $this->assertEquals($expectedValue, $this->testClass->isHidden());
    }

}
