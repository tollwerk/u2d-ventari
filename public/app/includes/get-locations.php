<?php
$Locations = $App->getLocations($params);
echo '<div class="column">';
echo '<strong>Locations</strong>';
echo '<br><br>';
foreach ($Locations as $location) {
    echo '<blockquote>';
    print_r($location);
    echo '</blockquote>';
}
echo '</div>';
