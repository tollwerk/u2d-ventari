<?php
//Require once the Composer Autoload
if (file_exists(__DIR__.'/vendor/autoload.php')) {
    require_once __DIR__.'/vendor/autoload.php';
}
?>
<!doctype html>
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
        <div class="content">
            <?php
            $params = $_GET;
            if (isset($params['function'])) {
                $App      = new Tollwerk\Ventari\Ports\Client();
                $function = $params['function'];
                unset($params['function']);

                if ($function == 'events') {
                    $Events = $App->makeRequest($function, $params);
                    foreach ($Events as $event) {
                        echo '<h3>'.$event->getEventName().'</h3>';
                        echo '<blockquote>';
                        echo '<p>Event Id: '.$event->getId().'</p>';
                        echo '<p>Event Date: '.$event->getEventStartDate()->format('d/m/Y').'</p>';
                        echo '<p>Event FE Link: '.$event->getEventFrontendLink().'</p>';
                        echo '</blockquote>';
                    }
                }

                if ($function == 'locations') {
                    $Locations = $App->makeRequest($function, $params);
                    foreach ($Locations as $location) {
                        echo '<h3>'.$location->getLocationName().'</h3>';
                        echo '<blockquote>';
                        echo '<p>Location Id: '.$location->getId().'</p>';
                        echo '<p>Location Address: '.$location->getLocationAddress().'</p>';
                        echo '<p>Location City: '.$location->getLocationCity().'</p>';
                        echo '</blockquote>';
                    }
                }

                if ($function == 'sessions') {
                    $Sessions = $App->makeRequest($function, $params);
                    foreach ($Sessions as $session) {
                        echo '<h3>'.$session->getSessionName().'</h3>';
                        print_r($session);
                        echo '<br>';
                    }
                }
            } else { ?>
                <div class="launch">
                    <form action="app.php">
                        <label for="events"><input type="radio" name="function" id="events" value="events" checked>Events</input></label>
                        <label for="locations"><input type="radio" name="function" id="locations" value="locations">Locations</input></label>
                        <label for="sessions"><input type="radio" name="function" id="sessions" value="sessions">Sessions</input></label>
                        <button>Run In!</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </body>
</html>