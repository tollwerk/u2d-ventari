<?php

namespace Tollwerk\Ventari\Tests\Domain;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;
use Tollwerk\Ventari\Domain\Contract\HttpClientInterface;
use Tollwerk\Ventari\Domain\VentariClient;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class VentariClientTest extends AbstractTestBase
{
    /**
     * Test Constructor
     */
    public function testConstructor()
    {
        $config = $this->createMock(ControllerInterface::class);
        $client = $this->createMock(HttpClientInterface::class);

        $testClass = new VentariClient($config, $client);

        $this->assertClassHasAttribute('config', get_class($testClass));
        $this->assertClassHasAttribute('client', get_class($testClass));
    }
}
