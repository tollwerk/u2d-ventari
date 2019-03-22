<?php
$participantEmail = isset($_POST["email"]) ? $_POST["email"] : "tester@tollwerk.de";
$eventId          = isset($_POST["event"]) ? $_POST["event"] : "1876";
?>

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
