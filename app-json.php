<pre>
<?php
$file = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Ventari'.DIRECTORY_SEPARATOR.'Tests'.DIRECTORY_SEPARATOR."Fixture".DIRECTORY_SEPARATOR.'Events.json';

echo file_get_contents($file);


echo '<br><br><br>';

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
