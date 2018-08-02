<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Domain\Model\Session;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class SessionTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class SessionTest extends AbstractTestBase
{
    /**
     * @var Session $testClass
     */
    public $testClass;

    protected function setUp(){
        $this->testClass = new Session();
    }

    public function testSessionId(): void
    {
        $expectedValue = 112358;
        $session = $this->testClass;
        $session->setSessionId($expectedValue);
        $this->assertEquals($expectedValue, $session->getSessionId());
    }

    public function testSessionName(): void
    {
        $expectedString = '';
        $session = $this->testClass;
        $session->setSessionName($expectedString);
        $this->assertEquals($expectedString, $session->getSessionName());
    }

    public function testSessionRemark(): void
    {
        $expectedString = '';
        $session = $this->testClass;
        $session->setSessionRemark($expectedString);
        $this->assertEquals($expectedString, $session->getSessionRemark());
    }

    public function testSessionStart(): void
    {
        $expectedString = '';
        $session = $this->testClass;
        $session->setSessionStart($expectedString);
        $this->assertEquals($expectedString, $session->getSessionStart());
    }

    public function testSessionEnd(): void
    {
        $expectedString = '';
        $session = $this->testClass;
        $session->setSessionEnd($expectedString);
        $this->assertEquals($expectedString, $session->getSessionEnd());
    }
}
