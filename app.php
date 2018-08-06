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
                        echo '<p>Event Date: '.$event->getEventStartDate()->format('d/m/Y').'</p>';
                        echo '<p>Event Id: '.$event->getEventFrontendLink().'</p>';
                        echo '<p>Event Id: '.$event->getId().'</p>';
                        echo '</blockquote>';
                    }
                }

                if ($function == 'location') {
                    $Locations = $App->makeRequest($function, $params);
                    foreach ($Locations as $location) {
                        echo '<h3>'.$location->getLocationName().'</h3>';

                    }
                }
            } else { ?>
                <div class="launch">
                    <form action="app.php">
                        <label for="events"><input type="radio" name="function" id="events" value="events" checked>Events</input></label>
                        <label for="location"><input type="radio" name="function" id="location" value="location">Location</input></label>
                        <button>Run In!</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </body>
</html>