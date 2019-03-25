<?php
$hasPostParams       = (count($_POST) > 0);
$participantEmail    = isset($_POST['email']) ? $_POST['email'] : 'tester@tollwerk.de';
$eventId             = isset($_POST['event']) ? $_POST['event'] : '1876';
$participantStatusId = isset($_POST['participantStatusId']) ? $_POST['participantStatusId'] : '';
?>

    <form action="" method="post">
        <div class="formFields">
            <div class="formField">
                <label for="participantStatusId">Status ID:</label>
                <select class="form-control" id="participantStatusId" name="participantStatusId">
                    <option value="">NO FILTER</option>
                    <option value="0">Angelegt (0)</option>
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
            </div>
            <input type="submit">
        </div>
    </form>
    <hr>
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
