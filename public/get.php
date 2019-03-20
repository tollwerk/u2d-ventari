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

if (strpos($request_uri, 'files/hash1234')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Files.json';

    return;
}

if (strpos($request_uri, 'files/empty')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Files-Empty.json';

    return;
}

if (strpos($request_uri, 'views/speakers')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Speakers.json';

    return;
}

if (strpos($request_uri, 'participants/?filterEventId=9')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Participant-Empty.json';

    return;
}

if (strpos($request_uri, 'participants/?filterEventId=9&filterFields={"pa_email":"email@domain.com"}')) {
    return;
}

if (strpos($request_uri, 'participants/?filterEventId=') || strpos($request_uri,
        'participants/?filterActiveEvents=1')) {
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

echo json_encode([
    'message' => 'Bad Route:',
    'input'   => $_SERVER['REQUEST_URI']
]);
