<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Application\Factory\SessionFactory;
use Tollwerk\Ventari\Domain\Model\Session;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class SessionTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class SessionTest extends AbstractTestBase
{
    /**
     * @var array
     */
    public $sessionApi;

    protected function setUp()
    {
        $factory          = new SessionFactory();
        $this->sessionApi = $factory->accessSessionApi();
    }

    public function testSessionId(): void
    {
        $testClass = new Session();
        foreach ($this->sessionApi as $property) {
            $this->assertClassHasAttribute($property, Session::class);
            $setter = 'set'.ucfirst($property);
            $getter = 'get'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $setter), $this->equalTo(true));
            $this->assertThat(method_exists($testClass, $getter), $this->equalTo(true));
        }
    }
}
