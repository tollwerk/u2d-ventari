<pre>
<?php
$sourcePath = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Ventari';
$filePath   = 'Tests'.DIRECTORY_SEPARATOR."Fixture".DIRECTORY_SEPARATOR.'Events.json';

echo '<h1>'.$filePath.'</h1>';
echo file_get_contents($sourcePath.DIRECTORY_SEPARATOR.$filePath);

echo '<br><br><br>';

echo '<h1>Json Encoded Array</h1>';
echo json_encode(array(
    'responseData' => array(
        'Events' => array(
            array(
                'eventName'    => 'Test Event Name',
                'eventstart'   => '2018-10-03',
                'frontendLink' => 'https://www.domain.com',
                'eventId'      => '1029'
            )
        )
    )
), JSON_PRETTY_PRINT);

?>
</pre>
