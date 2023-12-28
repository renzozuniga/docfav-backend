<?php

use Api\UserController;
use Api\DbConnection;

// require_once('../api/UserController.php');
// require_once('../api/DbConnection.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if ($uri[1] !== 'users') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$userId = null;
if (isset($uri[2])) {
    $userId = (int) $uri[2];
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

$dbConnection = null;
if($_SERVER['PROJECT_ENV'] !== 'test'){
    $DbConnectionObject = new DbConnection();
    $dbConnection = $DbConnectionObject->getConnection();
}


$controller = new UserController($userId, $dbConnection, $requestMethod);
echo $controller->processRequest();
