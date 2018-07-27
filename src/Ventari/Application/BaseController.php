<?php

namespace Tollwerk\Ventari\Application;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;

class BaseController implements ControllerInterface
{
    public $projectName;
    public $configFile;
    public $configuration;

    public $restAPI;

    public function __construct(string $projectName)
    {
        $configFile        = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'../config.xml';
        $this->projectName = (isset($projectName)) ? $projectName : "Ventari";
        $this->configFile  = $configFile;

        if (file_exists($this->configFile)) {
            $this->configuration = simplexml_load_file($this->configFile);
        }

        $this->init();
    }

    protected function init()
    {
        /**
         * $restAPI: SHOULD ONLY be a local variable. As it will be used to initiate the Resource. Only needed once.
         */
        $protocol      = $this->configuration->protocol."://";
        $url           = $this->configuration->uri;
        $path          = $this->sanitizePath($this->configuration->path);
        $this->restAPI = $protocol.$url.$path;

    }

    protected function sanitizePath(string $path)
    {
        $sanitizedPath = (preg_match('/^\/[aA-zZ]*/', $path)) ? $path : '/'.$path;

        return $sanitizedPath;
    }

    public function sanitizePathTester(string $pathToTest)
    {
        return $this->sanitizePath($pathToTest);
    }
}
