<?php
//Require once the Composer Autoload
if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

$App = new Tollwerk\Ventari\Ports\Client();

$function = $_GET['function'];
$params = $_GET;
unset($params['function']);

$App->makeRequest($function, $params);