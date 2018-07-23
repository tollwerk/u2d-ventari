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
	public function testConstructor()
	{
		$this->assertClassHasAttribute('project_name', BaseController::class);
		$baseController = new BaseController('Ventari');
		$this->assertInstanceOf(BaseController::class, $baseController);
		$this->assertEquals('Ventari', $baseController->project_name);
	}
}
