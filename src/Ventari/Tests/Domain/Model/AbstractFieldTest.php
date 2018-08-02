<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\AbstractField;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class AbstractFieldTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class AbstractFieldTest extends AbstractTestBase
{
    public $testClass;

    protected function setUp()
    {
        $this->testClass = $this->getMockForAbstractClass(AbstractField::class);
    }

    public function testAnzParamId(): void
    {
        $expectedValue = 123581321;
        $this->testClass->setAnzParamId($expectedValue);
        $this->assertEquals($expectedValue, $this->testClass->getAnzParamId());
    }

    public function testValue(): void
    {
        $expectedString = 'John Doe';
        $this->testClass->setValue($expectedString);
        $this->assertEquals($expectedString, $this->testClass->getValue());
    }

    public function testToken(): void
    {
        $expectedString = 'pa_fullname';
        $this->testClass->setToken($expectedString);
        $this->assertEquals($expectedString, $this->testClass->getToken());
    }
}
