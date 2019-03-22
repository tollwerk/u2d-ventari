<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Access-Control-Allow-Methods: GET");
    require_once './routes/routes-get.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Access-Control-Allow-Methods: POST");
    require_once './routes/routes-post.php';
}
