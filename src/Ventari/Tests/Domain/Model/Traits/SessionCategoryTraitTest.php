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

    public function testSessionCategoryColor(): void
    {
        $expectedString = '#EEE8AA';
        $mock           = $this->testTrait;
        $mock->setSessionCategoryColor($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getSessionCategoryColor());
    }

    public function testSessionCategoryId(): void
    {
        $expectedValue = 112358;
        $mock = $this->testTrait;
        $mock->setSessionCategoryId($expectedValue);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $mock->getSessionCategoryId());
    }

    public function testSessionCategoryName(): void
    {
        $expectedString = 'Introduction';
        $mock = $this->testTrait;
        $mock->setSessionCategoryName($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getSessionCategoryName());
    }


    public function testSessionSignposting(): void
    {
        $expectedString = 'http://server.com/signup/?eventId=1123';
        $mock = $this->testTrait;
        $mock->setSessionSignposting($expectedString);
        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue($expectedString));

        $this->assertEquals($expectedString, $mock->getSessionSignposting());
    }


}
