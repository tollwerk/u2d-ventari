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
        $this->assertClassHasAttribute('projectName', BaseController::class);
        $this->assertInstanceOf(BaseController::class, $baseController);
        $this->assertEquals('Ventari', $baseController->projectName);

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
        $this->assertFileExists($baseController->configFile);

        $actualXML = $baseController->configuration;
        $this->assertXmlStringEqualsXmlString($expectedXML->asXML(), $actualXML->asXML());

        return $baseController;
    }

    /**
     * Test Sanitizer Function
     * @dataProvider sanitizerProvider
     */
    public function testSanitizePath($path)
    {
        $this->assertNotEmpty($path);
        $baseController = new BaseController('ASDF');
        $sanitizedPath = $baseController->sanitizePath($path);
        $this->assertStringStartsWith('/', $sanitizedPath);
        $this->assertStringStartsNotWith('//', $sanitizedPath);
    }

    public function sanitizerProvider()
    {
        return [
            ['/link'],
            ['link'],
//            ['//link'],
            ['/path/to/api']
        ];
    }
}
