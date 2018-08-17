<?php
//Require once the Composer Autoload
if (file_exists(__DIR__.'/vendor/autoload.php')) {
    require_once __DIR__.'/vendor/autoload.php';
}

$participantEmail = isset($_POST["email"]) ? $_POST["email"] : "tester@tollwerk.de";
$eventId          = isset($_POST["event"]) ? $_POST["event"] : "1876";
?>
<!doctype html>
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
        <div class="content">
            <div class="column">
                <h3>Register For Event</h3>
                <form action="?function=registerForEvent" method="post">
                    <div class="formField">
                        <label for="email">E-Mail:</label>
                        <input type="text" id="email" name="email" value="<?php echo $participantEmail; ?>"
                               placeholder="Attendee Email Address">
                    </div>
                    <div class="formField">
                        <label for="event">Event:</label>
                        <input type="text" id="event" name="event" value="<?php echo $eventId; ?>"
                               placeholder="Event Id">
                    </div>
                    <input type="submit">
                </form>
                <hr>

                <h3>Check Registered Events</h3>
                <form action="?function=getRegisteredEvents" method="post">
                    <div class="formField">
                        <label for="email">E-Mail:</label>
                        <input type="text" id="email" name="email" value="<?php echo $participantEmail; ?>"
                               placeholder="Attendee Email Address">
                    </div>
                    <input type="submit">
                </form>
                <hr>

                <h3 style="margin-bottom:0;">Additional Methods</h3>
                <form action="?function=getParticipantCounts" method="post">
                    <input type="submit" value="GET PARTICIPANT COUNTS">
                </form>

                <br><a href="app-post.php">RESET</a>
            </div>

            <div class="column" style="width: 800px;">
                <blockquote>
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $config = require __DIR__.DIRECTORY_SEPARATOR.'config/config.php';
                        $App    = new \Tollwerk\Ventari\Ports\Client(
                            $config['method'],
                            $config['api'],
                            $config['authentication']
                        );

                        try {
                            if ($_GET['function'] === 'registerForEvent') {
                                $data = $App->registerForEvent((string)$participantEmail, (int)$eventId);
                            }
                            if ($_GET['function'] === 'getRegisteredEvents') {
                                $data = $App->getRegisteredEvents((string)$participantEmail);
                            }
                            if ($_GET['function'] === 'getParticipantCounts') {
                                $data = $App->getEventParticipants();
                            }
                        } catch (\Exception $e) {
                            echo '<pre>';
                            echo 'CAUGHT EXCEPTION: '.$e->getMessage().'<br>';
                            echo '</pre>';
                        }

                        echo 'Response:';
                        echo '<pre>';
                        print_r($data);
                        echo '</pre>';
                    }
                    ?>
                </blockquote>
            </div>

        </div>
    </body>
</html>