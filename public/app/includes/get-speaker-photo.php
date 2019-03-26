<?php
$hasPostParams = (count($_POST) > 0);
$speakerPhoto  = isset($_POST['fileId']) ? $_POST['fileId'] : '186';
?>
    <form action="" method="post">
        <div class="formFields">
            <div class="formField">
                <label for="fileId">File Id:</label>
                <input type="text" id="fileId" name="fileId" value="<?php echo $speakerPhoto; ?>" placeholder="File Id of the speaker:">
            </div>
            <input type="submit">
        </div>
    </form>
    <hr>
<?php
// TODO: Ensure exception is thrown when invalid instance of stdClass
if ($hasPostParams) {
    $response = [$VentariClient->$appFunction((string)$speakerPhoto)];
    $resIndex = 1;
    foreach ($response as $res) {
        echo '<pre>';
        echo '== START ('.$resIndex.') =='.PHP_EOL.PHP_EOL;
        print_r($res);
        echo '<br>';
        echo '<img src="data:'.$res['mimeType'].';base64,'.$res['content'].'" width="100%" class="responsive">';
        echo PHP_EOL.'== END ==';
        echo '</pre>';
        ++$resIndex;
    }
}
