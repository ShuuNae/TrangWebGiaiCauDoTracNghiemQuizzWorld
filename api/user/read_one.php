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
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare user object
$user = new User($db);

// set ID property of record to read
$user->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of user to be edited
$user->readOne();

if ($user->username != null) {
    // create array
    $user_arr = array(
        "id" =>  $user->id,
        "username" =>  $user->username,
        "password" =>  $user->password,
        "fullname" =>  $user->fullname,
        "gender" =>  $user->gender,
        "email" =>  $user->email,
        "role" => $user->role
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($user_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user user does not exist
    echo json_encode(array("message" => "user does not exist."));
}
