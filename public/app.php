<?php
//Require once the Composer Autoload
if (file_exists(dirname(__DIR__, 1).'/vendor/autoload.php')) {
    require_once dirname(__DIR__, 1).'/vendor/autoload.php';
}
?>
<!doctype html>
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="content">
            <?php
            $params = $_GET;
            $App = new Tollwerk\Ventari\Ports\Client();

            $Events = $App->getEvents(['statusIds' => 6]);
            echo '<div class="column">';
            echo '<strong>Events</strong>';
            echo '<br><br>';
            foreach ($Events as $event) {
                echo '<a href="https://events.nueww.de/rest/events/'.$event->getVentariId().'" target="_api">';
                if ($event->getOrganizerLogo() !== '') {
                    $LogoId = $event->getOrganizerLogo();
                    $File   = $App->getFile($LogoId);
                    echo '<img src="data:'.$File['mimeType'].';base64,'.$File['content'].'" width="100%" class="responsive">';
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
            echo '<br><br>';
            foreach ($Speakers as $speaker) {
//                echo '<blockquote>';
//                print_r($speaker);
//                echo '</blockquote>';
                if ($speaker->hasPhoto()){
                    $SpeakerId = $speaker->getVentariId();
                    $File   = $App->getSpeakerPhoto($SpeakerId);
                    echo $speaker->getGivenName().' '.$speaker->getFamilyName().'<br>';
                    echo '<img src="data:'.$File['mimeType'].';base64,'.$File['content'].'" width="100%">';
                } else {
                    echo $speaker->getGivenName().' '.$speaker->getFamilyName();
                    echo '<br><small>No Picture!</small><br>';
                }
                echo '<br><br>';
            }
            echo '</div>';

            $Locations = $App->getLocations($params);
            echo '<div class="column">';
            echo '<strong>Locations</strong>';
            echo '<br><br>';
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
            echo '<br><br>';
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
