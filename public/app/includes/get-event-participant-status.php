<?php
$hasPostParams        = (count($_POST) > 0);
$participantEmail     = isset($_POST['email']) ? $_POST['email'] : 'tester@tollwerk.de';
$eventId              = isset($_POST['event']) ? $_POST['event'] : '1876';
$participantStatusIds = isset($_POST['participantStatusIds']) ? $_POST['participantStatusIds'] : [];

function isChecked($statusId)
{
    if (in_array($statusId, $GLOBALS['participantStatusIds'])) {
        return 'checked';
    }
}

;
?>
    <form action="" method="post">
        <div class="formFields">
            <div class="formField">
                <label for="event">Event:</label>
                <input type="text" id="event" name="event" value="<?php echo $eventId; ?>"
                       placeholder="Event Id">
            </div>
            <div class="formField">
                <label>Participant Status:</label><br>
                <div style="padding-left:50px">

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="1" <?= isChecked(1); ?>>
                        <small>Eingeladen (1)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="9" <?= isChecked(9); ?>>
                        <small>Warteliste (9)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="3" <?= isChecked(3); ?>>
                        <small>Zugesagt ohne DHG (3)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="4" <?= isChecked(4); ?>>
                        <small>Zugesagt (4)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="5" <?= isChecked(5); ?>>
                        <small>Abgesagt (5)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="6" <?= isChecked(6); ?>>
                        <small>Abgesagt nach Zusage (6)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="7" <?= isChecked(7); ?>>
                        <small>Teilgenommen (7)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="8" <?= isChecked(8); ?>>
                        <small>No Show (8)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="10" <?= isChecked(10); ?>>
                        <small>Vorgemerkt (10)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="11" <?= isChecked(11); ?>>
                        <small>Nachnominiert (11)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="12" <?= isChecked(12); ?>>
                        <small>Abgelehnt (12)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="13" <?= isChecked(13); ?>>
                        <small>Termin zugeteilt (13)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="14" <?= isChecked(14); ?>>
                        <small>Bestätigt (14)</small>
                        <br>
                    </label>

                    <label>
                        <input type="checkbox" name="participantStatusIds[]" value="15" <?= isChecked(15); ?>>
                        <small>VA angelegt (15)</small>
                        <br>
                    </label>
                </div>
            </div>
            <input type="submit">
        </div>
    </form>
    <hr>
<?php
if ($hasPostParams) {
    $response = $VentariClient->$appFunction($eventId, $participantStatusIds);
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
