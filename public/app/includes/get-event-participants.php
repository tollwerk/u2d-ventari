<?php
$hasPostParams       = (count($_POST) > 0);
$participantStatusId = isset($_POST['participantStatusId']) ? $_POST['participantStatusId'] : '';

function isSelected($statusId)
{
    if ($statusId === $GLOBALS['participantStatusId']) {
        return 'selected';
    }
}

?>
    <form action="" method="post">
        <div class="formFields">
            <div class="formField">
                <label for="participantStatusId">Status ID:</label>
                <select class="form-control" id="participantStatusId" name="participantStatusId">
                    <option value="" <?= isSelected(''); ?>>NO FILTER</option>
                    <option value="0"  <?= isSelected('0'); ?>>Angelegt (0)</option>
                    <option value="1"  <?= isSelected('1'); ?>>Eingeladen (1)</option>
                    <option value="9"  <?= isSelected('9'); ?>>Warteliste (9)</option>
                    <option value="3"  <?= isSelected('3'); ?>>Zugesagt ohne DHG (3)</option>
                    <option value="4"  <?= isSelected('4'); ?>>Zugesagt (4)</option>
                    <option value="5"  <?= isSelected('5'); ?>>Abgesagt (5)</option>
                    <option value="6"  <?= isSelected('6'); ?>>Abgesagt nach Zusage (6)</option>
                    <option value="7"  <?= isSelected('7'); ?>>Teilgenommen (7)</option>
                    <option value="8"  <?= isSelected('8'); ?>>No Show (8)</option>
                    <option value="10"  <?= isSelected('10'); ?>>Vorgemerkt (10)</option>
                    <option value="11"  <?= isSelected('11'); ?>>Nachnominiert (11)</option>
                    <option value="12"  <?= isSelected('12'); ?>>Abgelehnt (12)</option>
                    <option value="13"  <?= isSelected('13'); ?>>Termin zugeteilt (13)</option>
                    <option value="14"  <?= isSelected('14'); ?>>Bestätigt (14)</option>
                    <option value="15"  <?= isSelected('15'); ?>>VA angelegt (15)</option>
                </select>
            </div>
            <input type="submit">
        </div>
    </form>
    <hr>
    <span>[ eventId ] => count</span>
<?php
if ($hasPostParams) {
    if (!empty($participantStatusId)) {
        $response = [$VentariClient->$appFunction($participantStatusId)];
    } else {
        $response = [$VentariClient->$appFunction()];
    }
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
