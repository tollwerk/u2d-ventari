<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

if ($request_uri[0] === 'events'){
    echo json_encode(['foo'=>'bar']);
}
if ($request_uri[0] === '/events'){
    echo json_encode(['foo'=>'/bar']);
}
if ($request_uri[0] === '/events/'){
    echo json_encode(['foo'=>'/bar/']);
}
