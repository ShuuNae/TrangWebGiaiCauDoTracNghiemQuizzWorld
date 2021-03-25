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

// instantiate quizz object
include_once '../objects/quizz.php';

$database = new Database();
$db = $database->getConnection();

$quizz = new Quizz($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if (
    !empty($data->topic_id) &&
    !empty($data->question) &&
    !empty($data->ansA) &&
    !empty($data->ansB) &&
    !empty($data->ansC) &&
    !empty($data->ansD) &&
    !empty($data->correct)
) {

    // set quizz property values
    $quizz->topic_id = $data->topic_id;
    $quizz->question = $data->question;
    $quizz->ansA = $data->ansA;
    $quizz->ansB = $data->ansB;
    $quizz->ansC = $data->ansC;
    $quizz->ansD = $data->ansD;

    // create the quizz
    if ($quizz->create()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "quizz was created."));
    }

    // if unable to create the quizz, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create quizz."));
    }
}

// tell the user data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create quizz. Data is incomplete."));
}
