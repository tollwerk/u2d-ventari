<?php

namespace Tollwerk\Ventari\Tests\Domain\Model;

use Tollwerk\Ventari\Application\Factory\EventFactory;
use Tollwerk\Ventari\Domain\Model\Event;
use Tollwerk\Ventari\Tests\AbstractTestBase;

class EventTest extends AbstractTestBase
{
    /**
     * @var array
     */
    public $eventApi;

    protected function setUp()
    {
        $factory        = new EventFactory();
        $this->eventApi = $factory->accessEventApi();
    }

    public function testClass(): void
    {
        $testClass = new Event();

        foreach ($this->eventApi as $property) {
            $this->assertClassHasAttribute($property, Event::class);
            $setter = 'set'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $setter), $this->equalTo(true));
        }

        foreach ($this->eventApi as $property) {
            $this->assertClassHasAttribute($property, Event::class);
            $getter = ($property !== 'hidden' && $property !== 'chargeable') ? 'get'.ucfirst($property) : 'is'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $getter), $this->equalTo(true));
        }
    }
}
