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

// include database and object files
include_once '../config/database.php';
include_once '../objects/quizz.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare quizz object
$quizz = new Quizz($db);

// get id of quizz to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of quizz to be edited
$quizz->id = $data->id;

// set quizz property values
$quizz->topic_id = $data->topic_id;
$quizz->question = $data->question;
$quizz->ansA = $data->ansA;
$quizz->ansB = $data->ansB;
$quizz->ansC = $data->ansC;
$quizz->ansD = $data->ansD;
$quizz->correct = $data->correct;

// update the quizz
if ($quizz->update()) {

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "quizz was updated."));
}

// if unable to update the quizz, tell the user
else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update quizz."));
}
