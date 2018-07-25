<?php

namespace Tollwerk\Ventari\Application;

class BaseController
{
    public $projectName;
    public $configFile;
    public $configuration;

    public function __construct(string $projectName)
    {
        $configFile       = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'../config.xml';
        $this->projectName = (isset($projectName)) ? $projectName : "Ventari";
        $this->configFile  = $configFile;

        if (file_exists($this->configFile)) {
            $this->configuration = simplexml_load_file($this->configFile);
        }

        $this->init();
    }

    public function init()
    {
        /**
         * REST_API SHOULD ONLY be a local variable. As it will be used to initiate the Resource. Only needed once.
         */
        $path     = $this->sanitizePath($this->configuration->path);
        $REST_API = $this->configuration->protocol."://".$this->configuration->uri.$path;
    }

    public function sanitizePath(string $path)
    {
        $sanitizedPath = (preg_match('/^\/[aA-zZ]*/', $path)) ? $path : '/'.$path;

        return $sanitizedPath;
    }
}