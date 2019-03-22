<?php
$participantEmail = isset($_POST["email"]) ? $_POST["email"] : "tester@tollwerk.de";
$eventId          = isset($_POST["event"]) ? $_POST["event"] : "1876";
?>

<h3>Event Participant Count (ALL)</h3>
<form action="?function=getEventParticipants" method="post">
    <input type="submit" value="GET EVENT PARTICIPANT COUNT">
</form>
<hr>
