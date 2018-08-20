<?php
$request_uri = $_SERVER['REQUEST_URI'];

if (strpos($request_uri, 'events')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Events.json';

    return;
}

if (strpos($request_uri, 'views/locations')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Locations.json';

    return;
}

if (strpos($request_uri, 'views/agenda')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Agenda.json';

    return;
}

if (strpos($request_uri, 'files')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Files.json';

    return;
}

if (strpos($request_uri, 'views/speakers')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Speakers.json';

    return;
}

if (strpos($request_uri, 'participants/?filterEventId=') || strpos($request_uri, 'participants/?filterActiveEvents=1')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Participant.json';

    return;
}

if (strpos($request_uri, 'uploads/2026/')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'SpeakerPhoto.json';

    return;
}

if (strpos($request_uri, 'bad')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'result.json';

    return;
}

// TODO POST METHOD FOR TESTING
//if (strpos($_SERVER['REQUEST_URI'], 'participants/filterEventId=1123')) {
//    require 'fixture'.DIRECTORY_SEPARATOR.'ParticipantRegistration.json';
//
//    return;
//}

echo json_encode([
    'message' => 'Bad Route:',
    'input' => $_SERVER['REQUEST_URI']
]);
