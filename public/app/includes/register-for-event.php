<?php
$hasPostParams    = (count($_POST) > 0);
$participantEmail = isset($_POST['email']) ? $_POST['email'] : 'tester@tollwerk.de';
$eventId          = isset($_POST['event']) ? $_POST['event'] : '1876';
?>
    <form action="" method="post">
        <div class="formFields">
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
        </div>
    </form>
    <hr>
    <span>[ personId, email, tmsLink ]</span>
<?php
if ($hasPostParams) {
    $response = [$VentariClient->$appFunction((string)$participantEmail, (int)$eventId)];
    $resIndex = 1;
    foreach ($response as $res) {
        echo '<pre>';
        echo '== START ('.$resIndex.') =='.PHP_EOL.PHP_EOL;
        print_r($res);
        echo PHP_EOL.'== END ==';
        echo '</pre>';
        ++$resIndex;
    }
}
