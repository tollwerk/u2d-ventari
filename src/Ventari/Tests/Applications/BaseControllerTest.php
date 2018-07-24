<?php

namespace Tollwerk\Ventari\Tests\Applications;

use Tollwerk\Ventari\Application\BaseController;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * BaseController test
 *
 * @package Tollwerk\Ventari\Tests\Application
 */
class BaseControllerTest extends AbstractTestBase
{

    /**
     * Test the BaseController
     */
    public function testConstructor()
    {
        $baseController = new BaseController('Ventari');
        $this->assertClassHasAttribute('project_name', BaseController::class);
        $this->assertInstanceOf(BaseController::class, $baseController);
        $this->assertEquals('Ventari', $baseController->project_name);

        return $baseController;
    }

    /**
     * Test the Configuration XML file
     * @depends testConstructor
     *
     * @param $baseController
     */
    public function testConfiguration($baseController)
    {
        $this->assertNotEmpty($baseController);

        $xmlString = <<<XML
<config clientId="U2D Ventari" type="REST">
    <protocol>http</protocol>
    <uri>events.nueww.de</uri>
    <path>/events</path>
</config>
XML;

        $expectedXML = new \SimpleXMLElement($xmlString);
        $expectedXML->saveXML();
        $this->assertFileExists($baseController->config_file);

        $actualXML = $baseController->configuration;
        $this->assertXmlStringEqualsXmlString($expectedXML->asXML(), $actualXML->asXML());

        return $baseController;
    }

    /**
     * Test Initiation Function
     * @depends testConstructor
     *
     * @param $baseController
     */
    public function testInitiation($baseController)
    {
        $this->assertNotEmpty($baseController->REST_API);
        $this->assertEquals('http://events.nueww.de/events', $baseController->REST_API);
    }
}