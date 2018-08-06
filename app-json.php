<?php
header('Content-Type: application/json');

$sourcePath   = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Ventari';
$filePath     = 'Tests'.DIRECTORY_SEPARATOR."Fixture".DIRECTORY_SEPARATOR.'Location.json';
$fileContents = file_get_contents($sourcePath.DIRECTORY_SEPARATOR.$filePath);

echo json_encode(json_decode($fileContents));
//echo json_encode(array(
//    'responseData' => array(
//        'Events' => array(
//            array(
//                'eventName' => 'Test VA 5',
//                'eventstart' => '2017-04-11',
//                'frontendLink' => 'https://ventari.kraft.dev/tms/frontend/frontend.cfm?l=1812',
//                'eventId' => 1812
//            ),
//            array(
//                'eventName' => 'Test VA 5',
//                'eventstart' => '2017-04-11',
//                'frontendLink' => 'https://ventari.kraft.dev/tms/frontend/frontend.cfm?l=1812',
//                'eventId' => 1812
//            ),
//            array(
//                'eventName' => 'Test VA 5',
//                'eventstart' => '2017-04-11',
//                'frontendLink' => 'https://ventari.kraft.dev/tms/frontend/frontend.cfm?l=1812',
//                'eventId' => 1812
//            ),
//            array(
//                'eventName' => 'Test VA 5',
//                'eventstart' => '2017-04-11',
//                'frontendLink' => 'https://ventari.kraft.dev/tms/frontend/frontend.cfm?l=1812',
//                'eventId' => 1812
//            )
//        )
//    )
//));
//echo '<h1>'.$filePath.'</h1>';
//
//echo '<br><br><br>';
//
//echo '<h1>Json Encoded Array</h1>';
//echo json_encode(array(
//    'responseData' => array(
//        'Events' => array(
//            array(
//                'eventName'    => 'Test Event Name',
//                'eventstart'   => '2018-10-03',
//                'frontendLink' => 'https://www.domain.com',
//                'eventId'      => '1029'
//            )
//        )
//    )
//), JSON_PRETTY_PRINT);

?>
