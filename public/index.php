<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once 'get.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'post.php';
}
