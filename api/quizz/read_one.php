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
include_once '../objects/quizz.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare quizz object
$quizz = new Quizz($db);

// set ID property of record to read
$quizz->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of quizz to be edited
$quizz->readOne();

if ($quizz->question != null) {
    // create array
    $quizz_arr = array(
        "id" =>  $quizz->id,
        "topic_id" =>  $quizz->topic_id,
        "question" =>  $quizz->question,
        "ansA" =>  $quizz->ansA,
        "ansB" =>  $quizz->ansB,
        "ansC" =>  $quizz->ansC,
        "ansD" => $quizz->ansD,
        "correct" => $quizz->correct
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($quizz_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user quizz does not exist
    echo json_encode(array("message" => "quizz does not exist."));
}
