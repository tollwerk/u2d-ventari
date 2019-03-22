<?php
$response = $VentariClient->$function();
$resIndex = 1;
foreach ($response as $res) {
    echo '<pre>';
    echo '== START ('.$resIndex.') =='.PHP_EOL.PHP_EOL;
    print_r($res);
    echo PHP_EOL.'== END ==';
    echo '</pre>';
    ++$resIndex;
}
