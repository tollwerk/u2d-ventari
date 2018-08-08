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

    public function testVentariId(): void
    {
        $expectedValue = 1235813;
        $this->testClass->setVentariId($expectedValue);
        $this->assertEquals($expectedValue, $this->testClass->getVentariId());
    }
    public function testHidden(): void
    {
        $expectedValue = false;
        $this->testClass->setHidden($expectedValue);
        $this->assertEquals($expectedValue, $this->testClass->isHidden());
    }

}
