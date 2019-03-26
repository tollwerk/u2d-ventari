<?php
$dropdown     = [
    'get'  => [
        'getEvents',
        'getLocations',
        'getSessions',
        'getSpeakers',
        'getAllParticipants',
    ],
    'post' => [
        'getFile',
        'getSpeakerPhoto',
        'registerForEvent',
        'getRegisteredEvents',
        'getEventParticipants',
        'getEventParticipantStatus'
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
            echo '<form class="selector" action="" method="'.$type.'">'.PHP_EOL;
            echo "\t\t\t".'<select>'.PHP_EOL;
            echo "\t\t\t\t".'<option value="null">Select '.strtoupper($type).' method</option>'.PHP_EOL;
            foreach ($functions as $function) {
                if ($testFunction === $function) {
                    echo "\t\t\t\t".'<option value="'.$function.'" selected>- '.$function.'</option>'.PHP_EOL;
                } else {
                    echo "\t\t\t\t".'<option value="'.$function.'">- '.$function.'</option>'.PHP_EOL;
                }
            }
            echo "\t\t\t".'</select>'.PHP_EOL;
            echo "\t\t".'</form>';
        }
        ?>
    </div>
</header>