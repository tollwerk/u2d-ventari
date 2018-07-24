<?php

namespace Tollwerk\Ventari\Application;

class BaseController {

	public $project_name;

	public function __construct(string $project_name) {
		$this->project_name = $project_name;
		if (isset($project_name)){
			$this->project_name = $project_name;
		} else {
			$this->project_name = 'Ventari';
		}
	}

}