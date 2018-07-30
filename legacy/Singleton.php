<?php

namespace Tollwerk\Ventari\Ports;

class Singleton
{
    protected static $instance = null;

    protected function __construct()
    {
    }

    public static function instance() {
        if (self::$instance === null){
            self::$instance = new self;
        }

        return self::$instance;
    }
}

$mySingleton = Singleton::instance();