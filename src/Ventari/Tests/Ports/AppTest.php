<?php

namespace Tollwerk\Ventari\Tests\Ports;

use Tollwerk\Ventari\Ports\App;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class AppTest extends AbstractTestBase
{

    public function testConstructor()
    {
        $this->assertClassHasAttribute('rootDirectory', App::class);
        $this->assertClassHasAttribute('restConfig', App::class);
    }

}
