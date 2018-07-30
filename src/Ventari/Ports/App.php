<?php

namespace Tollwerk\Ventari\Ports;

use Tollwerk\Ventari\Application\BaseController;

/**
 * Class App
 * @package    Tollwerk\Ventari
 * @subpackage Tollwerk\Ventari\Ports
 */
class App
{
    /**
     * Root Directory
     * @var string
     */
    protected static $rootDirectory;

    /**
     * URL Config
     * @var object
     */
    protected static $restConfig;

    /**
     * Base Controller
     * @var object
     */
    public $baseController;

    public function __construct()
    {
        //Initialize the Root Directory
        self::$rootDirectory = dirname(dirname(dirname(__DIR__))).DIRECTORY_SEPARATOR;

        $filePath         = self::$rootDirectory.'config'.DIRECTORY_SEPARATOR.'url-config.xml';
        $fileContent      = file_get_contents($filePath);
        self::$restConfig = simplexml_load_string($fileContent);

        $this->baseController = null;

        self::Initialize();
    }

    /**
     * Initialize Application
     */
    public function Initialize()
    {
        $this->baseController = BaseController::instance();
    }

    public function requestAllEvents()
    {
        $events = $this->baseController->getEvents();
        return $events;
    }
}
