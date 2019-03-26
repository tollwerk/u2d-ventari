<?php

namespace Tollwerk\Ventari\Tests\Infrastructure;

use Tollwerk\Ventari\Ports\Client as PortClient;
use Tollwerk\Ventari\Infrastructure\Exception\RuntimeException;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class ClientTest extends AbstractTestBase
{
    /**
     * @var PortClient $testClient
     */
    protected static $testClient;

    /**
     * Test infrastructure client via the ports client
     */
    public function testClient(): void
    {
        self::$testClient = new PortClient();

        $this->assertClassHasAttribute('client', \get_class(self::$testClient));
        $this->assertClassHasAttribute('handler', get_class(self::$testClient));
        $this->assertClassHasAttribute('dispatcher', \get_class(self::$testClient));
    }
    /**
     * TODO: makeRequest                - Exception
     * TODO: registerForEvent           - Exceptions
     * TODO: getEventParticipants       - Exceptions
     * TODO: getEventParticipantStatus  - Exceptions
     */

    /**
     * Test register for event exceptions
     *
     * @depends testClient
     */
    public function testRegisterForEvent(): void
    {
        $this->expectException(RuntimeException::class);

        $participantEmail = 'email@domain.com';
        $eventId          = 9;
        self::$testClient->registerForEvent($participantEmail, $eventId);
    }

/*
    public function testRuntimeException(): void
    {
        $exceptionMessage = 'RuntimeException Tester';
        $exceptionCode    = 0000;
        $testClass        = new RuntimeException($exceptionMessage, $exceptionCode);
        $this->assertEquals($exceptionMessage, $testClass->getMessage());
    }
*/


}
