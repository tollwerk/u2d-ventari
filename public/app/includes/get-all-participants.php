<?php
$participantEmail = isset($_POST["email"]) ? $_POST["email"] : "tester@tollwerk.de";
$eventId          = isset($_POST["event"]) ? $_POST["event"] : "1876";
?>

<h3>Retrieve All Participants </h3>
<form action="?function=getAllParticipants" method="post">
    <input type="submit" value="GET ALL PARTICIPANTS">
</form>
<hr>
