<?php
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