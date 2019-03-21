<?php
$Speakers = $App->getSpeakers();
echo '<div class="column">';
echo '<strong>Speakers</strong>';
echo '<br><br>';
foreach ($Speakers as $speaker) {
//                echo '<blockquote>';
//                print_r($speaker);
//                echo '</blockquote>';
    if ($speaker->hasPhoto()) {
        $SpeakerId = $speaker->getVentariId();
        $File      = $App->getSpeakerPhoto($SpeakerId);
        echo $speaker->getGivenName().' '.$speaker->getFamilyName().'<br>';
        echo '<img src="data:'.$File['mimeType'].';base64,'.$File['content'].'" width="100%">';
    } else {
        echo $speaker->getGivenName().' '.$speaker->getFamilyName();
        echo '<br><small>No Picture!</small><br>';
    }
    echo '<br><br>';
}
echo '</div>';