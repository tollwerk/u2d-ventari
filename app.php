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


//            $Events = $App->getEvents($params);
            echo '<div class="column">';
//            foreach ($Events as $event) {
                echo '<blockquote>';
                echo '<pre>';
//                print_r($event);
                echo '</pre>';
                echo '</pre>';
                echo '</blockquote>';
//                echo '<a href="https://events.nueww.de/rest/events/'.$event->getVentariId().'" target="_api">';
//                if ($event->getOrganizerLogo() !== '') {
//                    $LogoId = $event->getOrganizerLogo();
//                    $Files  = $App->getEventLogo($LogoId);
//                    echo '<pre>';
//                    foreach ($Files as $File) {
//                        echo '<img src="data:'.$File->mimeType.';base64,'.$File->content.'">';
//                    }
//                    echo '</pre>';
//                } else {
//                    echo $event->getName();
//                }
//                echo '</a>';
//                echo '<br>';
//            }
            echo '</div>';

            $Spearkers = $App->getSpeakers(['filterEventId' => 1876]);
            echo '<div class="column">';
            foreach ($Spearkers as $spearker) {
                echo '<blockquote>';
                print_r($spearker);
                echo '</blockquote>';
            }
            echo '</div>';

            $Locations = $App->getLocations($params);
            echo '<div class="column">';
            //            print_r($Locations);
            foreach ($Locations as $location) {
                echo '<blockquote>';
                print_r($location);
                echo '</blockquote>';
            }
            echo '</div>';

            $Sessions = $App->getSessions($params);
            echo '<div class="column">';
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