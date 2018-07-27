<?php

namespace Tollwerk\Ventari\Tests\Domain;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;
use Tollwerk\Ventari\Domain\VentariClient;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class VentariClientTest extends AbstractTestBase
{
    public $testClass;

    protected function setUp()
    {
        $config = $this->createMock(ControllerInterface::class);
        $client = $this->createMock(HttpClientInterface::class);

        $this->testClass = new VentariClient($config, $client);
    }

    /**
     * Test Constructor
     */
    public function testConstructor()
    {
        $this->assertClassHasAttribute('config', get_class($this->testClass));
        $this->assertClassHasAttribute('client', get_class($this->testClass));
    }

    /**
     * Test Stub
     */
    public function testStub()
    {
        $stub = $this->createMock(VentariClient::class);
        $expectedArray = array('foo' => 'bar');

        /**
         * 1. Test the Stub
         */
//        $stub->method('getPersonal')->will($this->returnSelf());
//        $this->assertSame($stub, $stub->getPersonal());

        /**
         * 2. Test the Stub's Method
         */
        $stub->method('doSomething')->willReturn($expectedArray);
        $this->assertSame($expectedArray, $stub->doSomething());

        /**
         * 3. Test the Stub's other Method with Parameter
         */
        $stub->method('doSomethingWithValue')->willReturn($expectedArray);
        $this->assertSame($expectedArray, $stub->doSomethingWithValue('bar'));

    }

    public function testStubReflection()
    {
        /**
         * So methods are only overwritten when inside a scope of another testMethod. Got it!
         */
        $stub = $this->createMock(VentariClient::class);
        $stub->method('doSomething')->will($this->returnSelf());
        $this->assertSame($stub, $stub->doSomething());
    }

//    public function testGetPersonal()
//    {
//        $reflector = new \ReflectionObject($this->testClass);
//        $method    = $reflector->getMethod('myMethod');
//        $this->assertTrue($method);
//    }
}
