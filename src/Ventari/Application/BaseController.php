<?php

namespace Tollwerk\Ventari\Application;

class BaseController
{

    public $project_name;

    public $config_file;
    public $configuration;


    public function __construct(string $project_name)
    {
        $config_file        = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'../config.xml';
        $this->project_name = (isset($project_name)) ? $project_name : "Ventari";
        $this->config_file  = $config_file;

        if (file_exists($this->config_file)) {
            $this->configuration = simplexml_load_file($this->config_file);
        }

        $this->init();
    }

    public function init()
    {
        /**
         * REST_API SHOULD ONLY be a local variable. As it will be used to initiate the Resource. Only needed once.
         */
        $REST_API = $this->configuration->protocol."://".$this->configuration->uri.$this->sanitizePath($this->configuration->path);
    }

    public function sanitizePath(string $path)
    {
        $sanitized_path = (preg_match('/^\/[aA-zZ]*/', $path)) ? $path : '/'.$path;

        return $sanitized_path;
    }
}