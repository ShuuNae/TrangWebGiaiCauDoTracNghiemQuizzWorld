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
include_once '../objects/user_quizz.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare user_quizz object
$user_quizz = new UserQuizz($db);

// get id of user_quizz to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of user_quizz to be edited
$user_quizz->id = $data->id;

// set user_quizz property values
$user_quizz->user_id = $data->user_id;
$user_quizz->topic_id = $data->topic_id;
$user_quizz->start_at = $data->start_at;
$user_quizz->finish_at = $data->finish_at;
$user_quizz->score = $data->score;
$user_quizz->quizz_data = $data->quizz_data;

// update the user_quizz
if ($user_quizz->update()) {

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "user_quizz was updated."));
}

// if unable to update the user_quizz, tell the user
else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update user_quizz."));
}
