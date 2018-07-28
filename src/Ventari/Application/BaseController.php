<?php

namespace Tollwerk\Ventari\Application;

use Tollwerk\Ventari\Domain\Contract\ControllerInterface;

class BaseController implements ControllerInterface
{
    /**
     * Instance of Class
     * @var null
     */
    protected static $instance = null;

    /**
     * BaseController constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Instance Instantiation
     * @return null|BaseController
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

}
