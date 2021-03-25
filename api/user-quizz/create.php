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


// get database connection
include_once '../config/database.php';

// instantiate user_quizz object
include_once '../objects/user_quizz.php';

$database = new Database();
$db = $database->getConnection();

$user_quizz = new UserQuizz($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if (
    !empty($data->user_id) &&
    !empty($data->topic_id) &&
    !empty($data->start_at) &&
    !empty($data->finish_at) &&
    !empty($data->score) &&
    !empty($data->quizz_data)
) {

    // set user_quizz property values
    $user_quizz->user_id = $data->user_id;
    $user_quizz->topic_id = $data->topic_id;
    $user_quizz->start_at = $data->start_at;
    $user_quizz->finish_at = $data->finish_at;
    $user_quizz->score = $data->score;
    $user_quizz->quizz_data = $data->quizz_data;
    // create the user_quizz
    if ($user_quizz->create()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user_quizz
        echo json_encode(array("message" => "user_quizz was created."));
    }

    // if unable to create the user_quizz, tell the user_quizz
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user_quizz
        echo json_encode(array("message" => "Unable to create user_quizz."));
    }
}

// tell the user_quizz data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user_quizz
    echo json_encode(array("message" => "Unable to create user_quizz. Data is incomplete."));
}
