<?php

namespace Tollwerk\Ventari\Application;

class BaseController {

	public $project_name;

	public $config_file;
	public $configuration;

	public function __construct(string $project_name) {
//		New Way
		$this->project_name = (isset($project_name)) ? $project_name : "Ventari";

		$this->config_file = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '../config.xml';
//		$this->configuration = (file_exists($this->config_file)) ? simplexml_load_file($this->config_file) : new \DOMElement('<config/>');

		if (file_exists($this->config_file)){
			$this->configuration = simplexml_load_file($this->config_file);
		}
	}
}