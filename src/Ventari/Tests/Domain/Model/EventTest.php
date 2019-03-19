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
        $this->eventApi = $factory->accessEventApi();

        foreach ($input as $key => $value) {
            if (isset($this->eventApi[$key])) {
                $property = $this->eventApi[$key];
            } else {
                $property = $this->eventApi['event_city'];
            }
            $this->assertClassHasAttribute($property, Event::class);

            $setter = 'set'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $setter), $this->equalTo(true));

            $refinedValue = $factory->accessRefineValue($key, $value);
            $testClass->$setter($refinedValue);
            $getter = ($property !== 'hidden' && $property !== 'chargeable') ? 'get'.ucfirst($property) : 'is'.ucfirst($property);
            $this->assertThat(method_exists($testClass, $getter), $this->equalTo(true));

            if (!\is_object($testClass->$getter())) {
                $this->assertEquals($refinedValue, $testClass->$getter());
            } else {
                $this->assertIsObject($testClass->$getter());
            }
        }
    }

    public function jsonInputProvider(): array
    {
        return [
            [
                [
                    'event_city'                   => 'Nürnberg',
                    'event_end_date'               => '2018-10-22',
                    'active'                       => 0,
                    'event_start_time'             => '09:00',
                    'event_presentation_language'  => '1,2',
                    'event_contact_facebook'       => 'https://www.facebook.com/rainer.hertwig',
                    'event_targetgroup'            => 472,
                    'frontendLink'                 => 'https://events.nueww.de/tms/frontend/frontend.cfm?l=1876',
                    'event_level'                  => '2,3',
                    'event_tracks'                 => '',
                    'event_max_participants'       => 30,
                    'event_twitter_handle'         => 'https://twitter.com/nueww',
                    'event_contact_logo'           => '1737A1BB7E24D0E43471C72DD5005D3F',
                    'event_cost_description'       => 'Die US-Sanktionen gegen die Türkei sind nicht das Ende, sondern womöglich erst Beginn einer folgenreichen Konfrontation: Selbst die Nato-Mitgliedschaft des Landes ist fraglich. Profitieren könnte davon ein Dritter. Eine',
                    'event_contact_instagram'      => 'https://www.instagram.com/nueww/',
                    'event_description_long'       => 'Dieses Event dient der Veranschaulichung und exemplarischen Erläuterung der Vorgehensweise zur Vervollständigung der Eventdaten und als Einführung in das Teilnehmermanagement. Dieses Event dient der Veranschaulichung und exemplarischen Erläuterung der Vorgehensweise zur Vervollständigung der Eventdaten und als Einführung in das Teilnehmermanagement.\r\n\r\nhttp://www.spiegel.de/\r\n\r\nVorgehensweise zur Vervollständigung der Eventdaten und als Einführung in das Teilnehmermanagement. Dieses Event dient der Veranschaulichung und exemplarischen Erläuterung der Vorgehensweise zur Vervollständigung der Eventdaten und als Einführung in das Teilnehmermanagement.',
                    'event_endtime'                => '17:30',
                    'event_image'                  => '7C4EFE2494BCE443382C54A4EABBFB6D',
                    'event_status'                 => '',
                    'id'                           => 1876,
                    'event_livestream'             => '',
                    'event_other_tags'             => 'Hochzeit, qwertz, Sport',
                    'event_xing_event'             => 'https://www.xing.com/events/nurnberg-web-week-2018-1869393?sc_o=events_events_near_you',
                    'event_category'               => '486,488,490,492,494',
                    'event_description'            => 'Dieses Event dient der Veranschaulichung und exemplarischen Erläuterung der Vorgehensweise zur Vervollständigung der Eventdaten und als Einführung in das Teilnehmermanagement.',
                    'event_cost'                   => '33.50',
                    'event_name'                   => 'U2D Schulungsevent (Veranstalterschulung)',
                    'event_ticket_url'             => '',
                    'event_chargeable'             => true,
                    'event_typ'                    => '',
                    'event_contact_name'           => 'Rainer Hertwig',
                    'event_start_date'             => '2018-10-22',
                    'event_contact_twitter_handle' => 'https://twitter.com/nueww',
                    'event_contact_links'          => 'https://www.xing.com/profile/Nadine_Karrasch/',
                    'event_facebook_event'         => 'https://www.facebook.com/events/1289047444556473/',
                    'event_livestream_code'        => '',
                    'event_contact_email'          => 'kreativplattform-hertwig@online.de',
                    'event_id'                     => 1876,
                    'event_website'                => 'https://www.ventari.de'
                ]
            ]
        ];
    }
}
