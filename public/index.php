<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
header('Content-Type: application/json');

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

if (strpos($request_uri[0], 'participants')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'SpeakerPhoto.json';
    return;
}

echo json_encode(['message' => 'No Route Setup']);