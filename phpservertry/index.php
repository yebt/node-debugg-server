<?php

require "bootstrap.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);


if ($uri[1] !== 'debug') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

processRequest();

// ------------------

function processRequest()
{
    global $requestMethod;

    switch ($requestMethod) {
        case 'GET':
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = json_encode($_GET);
            break;
        case 'POST':
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = json_encode($_POST);
            break;
        default:
            $response = notFoundResponse();
            break;
    }

    header($response['status_code_header']);

    if ($response['body']) {
        echo $response['body'];
    }
    ob_start();
var_dump($_POST);
error_log(ob_get_clean(), 4);
}


function notFoundResponse()
{
    echo "asdf";
    $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
    $response['body'] = json_encode('eror');
    return $response;
}
