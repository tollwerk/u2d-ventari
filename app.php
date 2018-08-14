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
            echo '<strong>Events</strong>';
            foreach ($Events as $event) {
//                echo '<blockquote>';
//                print_r($event);
//                echo '</blockquote>';
                echo '<a href="https://events.nueww.de/rest/events/'.$event->getVentariId().'" target="_api">';
                if ($event->getOrganizerLogo() !== '') {
                    $LogoId = $event->getOrganizerLogo();
                    $File   = $App->getFile($LogoId);
                    echo '<img src="data:'.$File['mimeType'].';base64,'.$File['content'].'">';
                } else {
                    echo $event->getName();
                }
                echo '</a>';
                echo '<br>';
            }
            echo '</div>';

            $Speakers = $App->getSpeakers();
            echo '<div class="column">';
            echo '<strong>Speakers</strong>';
            foreach ($Speakers as $speaker) {
                echo '<blockquote>';
                print_r($speaker);
                echo '</blockquote>';
            }
            echo '</div>';

            $Locations = $App->getLocations($params);
            echo '<div class="column">';
            echo '<strong>Locations</strong>';
//            print_r($Locations);
            foreach ($Locations as $location) {
                echo '<blockquote>';
                print_r($location);
                echo '</blockquote>';
            }
            echo '</div>';

            $Sessions = $App->getSessions($params);
            echo '<div class="column">';
            echo '<strong>Sessions</strong>';
            foreach ($Sessions as $session) {
                echo '<blockquote>';
                print_r($session);
                echo '</blockquote>';
            }
            echo '</div>';
            ?>
        </div>
    </body>
</html>