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
            echo '<div class="column">';
            print_r($Events);
//            foreach ($Events as $event) {
//                echo '<strong>'.$event->getEventName($params).'</strong>';
//                echo '<blockquote>';
//                echo '<p>Event Id: '.$event->getId().'</p>';
//                echo '<p>Event Date: '.$event->getEventStartDate()->format('d/m/Y').'</p>';
//                echo '<p>Event FE Link: '.$event->getEventFrontendLink().'</p>';
//                echo '</blockquote>';
//            }
            echo '</div>';

            $Locations = $App->getLocations($params);
            echo '<div class="column">';
            print_r($Locations);
//            foreach ($Locations as $location) {
//                echo '<strong>'.$location->getLocationName().'</strong>';
//                echo '<blockquote>';
//                echo '<p>Location Id: '.$location->getId().'</p>';
//                echo '<p>Location Address: '.$location->getLocationAddress().'</p>';
//                echo '<p>Location City: '.$location->getLocationCity().'</p>';
//                echo '</blockquote>';
//            }
            echo '</div>';

            $Sessions = $App->getSessions($params);
            echo '<div class="column">';
            print_r($Sessions);
//            foreach ($Sessions as $session) {
//                echo '<strong>'.$session->getSessionName().'</strong>';
//                echo '<blockquote>';
//                echo '<p>Session Id: '.$session->getId().'</p>';
//                echo '<p>Session Category Id: '.$session->getSessionCategoryId().'</p>';
//                echo '<p>Session Start: '.$session->getSessionStart()->format('g:ia \o\n l jS F Y').'</p>';
//                echo '</blockquote>';
//            }
            echo '</div>';
            ?>
        </div>
    </body>
</html>