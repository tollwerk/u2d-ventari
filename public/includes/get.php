<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

if (strpos($request_uri[0], 'events')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Events.json';

    return;
}

if (strpos($request_uri[0], 'views/locations')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Locations.json';

    return;
}

if (strpos($request_uri[0], 'views/agenda')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Agenda.json';

    return;
}

if (strpos($request_uri[0], 'files')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Files.json';

    return;
}

if (strpos($request_uri[0], 'views/speakers')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Speakers.json';

    return;
}

if (strpos($request_uri[0], 'participants')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'SpeakerPhoto.json';

    return;
}

if (strpos($request_uri[0], 'bad/response')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'result.json';

    return;
}

// TODO POST METHOD FOR TESTING
//if (strpos($_SERVER['REQUEST_URI'], 'participants/filterEventId=1123')) {
//    require 'fixture'.DIRECTORY_SEPARATOR.'ParticipantRegistration.json';
//
//    return;
//}

echo json_encode(['message' => 'No Route Setup']);
