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

    /**
     * Test Class Properties
     *
     * @param $input
     *
     * @dataProvider jsonInputProvider
     */
    public function testClass($input): void
    {
        $testClass = new Event();
        $factory   = new EventFactory();

        foreach ($input as $key => $value) {
            $property = (isset($this->eventApi[$key])) ? $this->eventApi[$key] : $this->eventApi['event_city'];
            $this->assertClassHasAttribute($property, Event::class);

            $setter = 'set'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $setter), $this->equalTo(true));

            $refinedValue = $factory->accessRefineValue($key, $value);
            $testClass->$setter($refinedValue);
            $getter = ($property !== 'hidden' && $property !== 'chargeable') ? 'get'.ucfirst($property) : 'is'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $getter), $this->equalTo(true));
            $this->assertEquals($refinedValue, $testClass->$getter());
        }
    }

    public function jsonInputProvider(): array
    {
        return [
            [
                array(
                    'event_city'                   => "Nürnberg",
                    'event_end_date'               => "2018-09-01",
                    'active'                       => true,
                    'event_start_time'             => "",
                    'event_presentation_language'  => "",
                    'event_contact_facebook'       => "",
                    'event_targetgroup'            => "",
                    'frontendLink'                 => "https://events.nueww.de/tms/frontend/frontend.cfm?l=1000",
                    'event_level'                  => "",
                    'event_tracks'                 => "",
                    'event_max_participants'       => "",
                    'event_twitter_handle'         => "",
                    'event_contact_logo'           => "",
                    'event_cost_description'       => "",
                    'event_contact_instagram'      => "",
                    'event_description_long'       => "",
                    'event_endtime'                => "",
                    'event_image'                  => "",
                    'event_status'                 => "",
                    'id'                           => 1000,
                    'event_livestream'             => "",
                    'event_other_tags'             => "",
                    'event_xing_event'             => "",
                    'event_category'               => "",
                    'event_description'            => "Test",
                    'event_cost'                   => "",
                    'event_name'                   => "Eventanmeldung NUEWW 2018",
                    'event_ticket_url'             => "",
                    'event_chargeable'             => "",
                    'event_typ'                    => "",
                    'event_contact_name'           => "",
                    'event_start_date'             => "2018-03-01",
                    'event_contact_twitter_handle' => "",
                    'event_contact_links'          => "",
                    'event_facebook_event'         => "",
                    'event_livestream_code'        => "",
                    'event_contact_email'          => "",
                    'event_id'                     => 1000,
                    'event_website'                => ""
                )
            ]
        ];
    }
}
