<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Application\Factory\LocationFactory;
use Tollwerk\Ventari\Domain\Model\Location;
use Tollwerk\Ventari\Tests\AbstractTestBase;

/**
 * Class LocationTest
 * @package Tollwerk\Ventari\Tests\Domain\Model
 */
class LocationTest extends AbstractTestBase
{
    /**
     * @var array
     */
    public $locationApi;

    protected function setUp()
    {
        $factory           = new LocationFactory();
        $this->locationApi = $factory->accessLocationApi();
    }

    public function testClass(): void
    {
        $testClass = new Location();
        foreach ($this->locationApi as $property) {
            $this->assertClassHasAttribute($property, Location::class);
            $setter = 'set'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $setter), $this->equalTo(true));
        }

        foreach ($this->locationApi as $property) {
            $this->assertClassHasAttribute($property, Location::class);
            $getter = 'get'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $getter), $this->equalTo(true));
        }
    }
}
