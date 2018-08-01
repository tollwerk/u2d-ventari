<?php

namespace Tollwerk\Ventari\Tests\Domain;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;
use Tollwerk\Ventari\Domain\VentariClient;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class VentariClientTest extends AbstractTestBase
{
    /**
     * @var VentariClient $testClass
     */
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

}
