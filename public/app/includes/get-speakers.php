<div class="column">
    <h2>Speakers</h2>
    <br>
<?php
try {
    $App = new Tollwerk\Ventari\Ports\Client();
    $Speakers = $App->getSpeakers();
} catch (RuntimeException $exception) {
    throw new RuntimeException($exception->getMessage(), $exception->getCode());
}

foreach ($Speakers as $speaker) {
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
?>
</div>
