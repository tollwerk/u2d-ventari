<?php

namespace Tollwerk\Ventari\Tests\Applications;

use Tollwerk\Ventari\Application\BaseController;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * BaseController test
 *
 * @package Tollwerk\Ventari\Tests\Application
 */
class BaseControllerTest extends AbstractTestBase {

	/**
	 * Test the BaseController
	 */
	public function testConstructor() {
		$baseController = new BaseController( 'Ventari' );
		$this->assertClassHasAttribute( 'project_name', BaseController::class );
		$this->assertInstanceOf( BaseController::class, $baseController );
		$this->assertEquals( 'Ventari', $baseController->project_name );

		return $baseController;
	}

	/**
	 * Test the Configuration XML file
	 * @depends testConstructor
	 * @param $baseController
	 */
	public function testConfiguration( $baseController ) {
		$this->assertNotEmpty( $baseController );

		$expectedXML = new \SimpleXMLElement('<config clientId="U2D Ventari" type="REST"><protocol>http</protocol><uri>events.nueww.de</uri><path>/events</path></config>');
		$expectedXML->saveXML();
		$actualXML = $baseController->configuration;

		$this->assertFileExists($baseController->config_file);
		$this->assertXmlStringEqualsXmlString($expectedXML->asXML(), $actualXML->asXML());
	}
}
