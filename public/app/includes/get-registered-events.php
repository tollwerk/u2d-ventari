<?php
$hasPostParams    = (count($_POST) > 0);
$participantEmail = isset($_POST['email']) ? $_POST['email'] : 'tester@tollwerk.de';
?>
    <form action="" method="post">
        <div class="formFields">
            <div class="formField">
                <label for="email">E-Mail:</label>
                <input type="text" id="email" name="email" value="<?php echo $participantEmail; ?>"
                       placeholder="Attendee Email Address">
            </div>
            <input type="submit">
        </div>
    </form>
    <hr>
    <span>[ eventId ] => [ statusId, tmsLink ]</span>
<?php
if ($hasPostParams) {
    $response = [$VentariClient->$appFunction((string)$participantEmail)];
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
