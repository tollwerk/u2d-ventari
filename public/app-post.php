<?php
//Require once the Composer Autoload
if (file_exists(dirname(__DIR__, 1).'/vendor/autoload.php')) {
    require_once dirname(__DIR__, 1).'/vendor/autoload.php';
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
        <link rel="stylesheet" href="css/style.css">
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

                <h3>Retrieve All Participants </h3>
                <form action="?function=getAllParticipants" method="post">
                    <input type="submit" value="GET ALL PARTICIPANTS">
                </form>
                <hr>

                <h3>Event Participant Count by Status Id</h3>
                <form action="?function=getParticipantCounts" method="post">
                    <label for="participantStatusId"></label>
                    <select class="form-control" id="participantStatusId" name="participantStatusId">
                        <option selected="selected" value="0">Angelegt (0)</option>
                        <option value="1">Eingeladen (1)</option>
                        <option value="9">Warteliste (9)</option>
                        <option value="3">Zugesagt ohne DHG (3)</option>
                        <option value="4">Zugesagt (4)</option>
                        <option value="5">Abgesagt (5)</option>
                        <option value="6">Abgesagt nach Zusage (6)</option>
                        <option value="7">Teilgenommen (7)</option>
                        <option value="8">No Show (8)</option>
                        <option value="10">Vorgemerkt (10)</option>
                        <option value="11">Nachnominiert (11)</option>
                        <option value="12">Abgelehnt (12)</option>
                        <option value="13">Termin zugeteilt (13)</option>
                        <option value="14">Bestätigt (14)</option>
                        <option value="15">VA angelegt (15)</option>
                    </select>
                    <input type="submit" value="GET PARTICIPANT COUNTS">
                </form>
                <hr>

                <h3>Event Participant Status Ids</h3>
                <form action="?function=getEventParticipantStatus" method="post">
                    <div class="formField">
                        <label for="event">Event:</label>
                        <input type="text" id="event" name="event" value="<?php echo $eventId; ?>"
                               placeholder="Event Id">
                    </div>
                    <br>
                    <div class="formField">
                        <label>Participant Status:</label><br>
                        <div style="padding-left:50px">

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="1">
                                <small>Eingeladen (1)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="9">
                                <small>Warteliste (9)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="3">
                                <small>Zugesagt ohne DHG (3)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="4" checked>
                                <small>Zugesagt (4)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="5" checked>
                                <small>Abgesagt (5)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="6" checked>
                                <small>Abgesagt nach Zusage (6)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="7">
                                <small>Teilgenommen (7)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="8">
                                <small>No Show (8)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="10">
                                <small>Vorgemerkt (10)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="11">
                                <small>Nachnominiert (11)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="12">
                                <small>Abgelehnt (12)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="13">
                                <small>Termin zugeteilt (13)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="14">
                                <small>Bestätigt (14)</small>
                                <br>
                            </label>

                            <label>
                                <input type="checkbox" name="participantStatusIds[]" value="15">
                                <small>VA angelegt (15)</small>
                                <br>
                            </label>
                        </div>
                    </div>
                    <input type="submit" value="GET EVENT PARTICIPANT STATUS IDS">
                </form>
                <hr>

                <h3>Event Participant Count (ALL)</h3>
                <form action="?function=getEventParticipants" method="post">
                    <input type="submit" value="GET EVENT PARTICIPANT COUNT">
                </form>


                <br><a href="app-post.php">RESET</a>
            </div>

            <div class="column" style="width: 800px;">
                <blockquote>
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $config = require dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'config/config.php';
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
                            if ($_GET['function'] === 'getAllParticipants') {
                                $data = $App->getAllParticipants();
                            }
                            if ($_GET['function'] === 'getParticipantCounts') {
                                $data = $App->getEventParticipants((int)$_POST['participantStatusId']);
                            }
                            if ($_GET['function'] === 'getEventParticipants') {
                                $data = $App->getEventParticipants();
                            }
                            if ($_GET['function'] === 'getEventParticipantStatus') {
                                $data = $App->getEventParticipantStatus($_POST['event'], $_POST['participantStatusIds']);
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
