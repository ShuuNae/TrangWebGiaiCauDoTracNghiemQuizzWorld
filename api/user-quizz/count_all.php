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
$user_quizz->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

// read the details of user_quizz to be edited
echo $user_quizz->countAllForUser();
