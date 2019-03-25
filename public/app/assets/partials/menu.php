<?php
$dropdown     = [
    'get'  => [
        'getEvents',
        'getSpeakers',
        'getLocations',
        'getAllParticipants',
        'getSessions'
    ],
    'post' => [
        'getEventParticipantStatus',
        'getEventParticipants',
        'getRegisteredEvents',
        'registerForEvent'
    ]
];
$testFunction = (isset($_GET['function'])) ? $_GET['function'] : '';
?>
<header>
    <div>
        <h1><a href="/app" class="headerLink">tollwerk/u2d-ventari</a></h1>
    </div>
    <div style="display: inline-flex;">
        <?php
        foreach ($dropdown as $type => $functions) {
            echo '<form class="selector" action="" method="'.$type.'">';
            echo '<select>';
            echo '<option value="null">Select '.strtoupper($type).' method</option>';
            foreach ($functions as $function) {
                if ($testFunction === $function) {
                    echo '<option value="'.$function.'" selected>- '.$function.'</option>';
                } else {
                    echo '<option value="'.$function.'">- '.$function.'</option>';
                }
            }
            echo '</select>';
            echo '</form>';
        }
        ?>
    </div>
</header>