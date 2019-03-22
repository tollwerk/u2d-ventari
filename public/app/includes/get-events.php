<div class="column">
    <h2>Events</h2>
    <br>
<?php
try {
    $App = new Tollwerk\Ventari\Ports\Client();
    $Events = $App->getEvents(['statusIds' => 1]);
} catch (RuntimeException $exception) {
    throw new RuntimeException($exception->getMessage(), $exception->getCode());
}

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
?>
</div>
