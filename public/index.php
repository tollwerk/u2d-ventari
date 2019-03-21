<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once './routes/routes-get.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './routes/routes-post.php';
}
