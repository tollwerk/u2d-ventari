<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

if (strpos($request_uri[0], 'participants')) {
    require 'fixture'.DIRECTORY_SEPARATOR.'Events.json';

    return;
}

echo json_encode(['message' => 'No Route Setup: ']);