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

// instantiate user object
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if (
    !empty($data->username) &&
    !empty($data->password)
) {

    // set user property values
    $user->username = $data->username;
    $user->password = $data->password;

    // login the user
    $res = $user->login();
    if ($res && $user->username != null) {

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
    }

    // if unable to create the user, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(415);

        // tell the user
        echo json_encode(array("message" => "Username or password is incorrect."));
    }
}

// tell the user data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to login. Data is incomplete."));
}
