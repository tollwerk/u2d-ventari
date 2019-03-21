<header>
    <h1>
        <a href="/app">
            tollwerk/u2d-ventari
        </a>
    </h1>
    <form action="">
        <?php
        $dropdown = [
            'get'  => [
                'getEvents',
                'getSpeakers',
                'getLocations',
                'getSessions'
            ],
            'post' => [
                'registerForEvent',
                'getRegisteredEvents',
                'getAllParticipants',
                'getEventParticipants',
                'getEventParticipants',
                'getEventParticipantStatus'
            ]
        ];

        foreach ($dropdown as $type => $methods) {
            echo '<select>';
            echo '<option value="null">Select '.strtoupper($type).' method</option>';
            foreach ($methods as $method) {
                if (isset($_GET['method']) && $_GET['method'] === $method){
                    echo '<option value="'.$method.'" selected> - '.$method.'</option>';
                } else {
                    echo '<option value="'.$method.'"> - '.$method.'</option>';
                }
            }
            echo '</select>';
        }
        ?>
    </form>
</header>