<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
    header("HTTP/1.1 200 OK");
    die();
}


// include database and object file
include_once '../config/database.php';
include_once '../objects/quizz.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare quizz object
$quizz = new Quizz($db);

// get quizz id
$data = json_decode(file_get_contents("php://input"));

// set quizz id to be deleted
$quizz->id = $data->id;

// delete the quizz
if ($quizz->delete()) {

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "quizz was deleted."));
}

// if unable to delete the quizz
else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to delete quizz."));
}
