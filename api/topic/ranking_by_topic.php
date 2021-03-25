<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
    header("HTTP/1.1 200 OK");
    die();
}


// include database and object files
include_once '../config/database.php';
include_once '../objects/topic.php';

// instantiate database and topic object
$database = new Database();
$db = $database->getConnection();

// initialize object
$topic = new Topic($db);

// set ID property of record to read
$topic->id = isset($_GET['id']) ? $_GET['id'] : die();

// query topics
$stmt = $topic->rankingByTopic();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // topics array
    $users = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($users, $row);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show topics data in json format
    echo json_encode($users);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No user found for this topic.")
    );
}
