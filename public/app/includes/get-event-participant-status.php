<?php
$participantEmail = isset($_POST["email"]) ? $_POST["email"] : "tester@tollwerk.de";
$eventId          = isset($_POST["event"]) ? $_POST["event"] : "1876";
?>

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
