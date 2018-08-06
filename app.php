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
            $config = require __DIR__.DIRECTORY_SEPARATOR.'config/config.php';

            $App = new Tollwerk\Ventari\Ports\Client($config['method'], $config['api'], $config['authentication']);

            $Events = $App->getEvents($params);
            foreach ($Events as $event) {
                echo '<h3>'.$event->getEventName($params).'</h3>';
                echo '<blockquote>';
                echo '<p>Event Id: '.$event->getId().'</p>';
                echo '<p>Event Date: '.$event->getEventStartDate()->format('d/m/Y').'</p>';
                echo '<p>Event FE Link: '.$event->getEventFrontendLink().'</p>';
                echo '</blockquote>';
            }
            $Locations = $App->getLocations($params);
            foreach ($Locations as $location) {
                echo '<h3>'.$location->getLocationName().'</h3>';
                echo '<blockquote>';
                echo '<p>Location Id: '.$location->getId().'</p>';
                echo '<p>Location Address: '.$location->getLocationAddress().'</p>';
                echo '<p>Location City: '.$location->getLocationCity().'</p>';
                echo '</blockquote>';
            }
            $Sessions = $App->getSessions($params);
            foreach ($Sessions as $session) {
                echo '<h3>'.$session->getSessionName().'</h3>';
                print_r($session);
                echo '<br>';
            }
            ?>
        </div>
    </body>
</html>