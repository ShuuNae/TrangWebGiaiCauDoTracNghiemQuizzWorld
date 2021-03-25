<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

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

// set ID property of record to read
$user_quizz->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of user_quizz to be edited
$user_quizz->readOne();

if ($user_quizz->topic_id != null) {
    // create array
    $user_quizz_arr = array(
        "id" =>  $user_quizz->id,
        "user_id" => $user_quizz->user_id,
        "topic_id" => $user_quizz->topic_id,
        "start_at" => $user_quizz->start_at,
        "finish_at" => $user_quizz->finish_at,
        "score" => $user_quizz->score,
        "quizz_data" => $user_quizz->quizz_data
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($user_quizz_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user user_quizz does not exist
    echo json_encode(array("message" => "user_quizz does not exist."));
}
