<?php
$Events = $App->getEvents(['statusIds' => 1]);
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