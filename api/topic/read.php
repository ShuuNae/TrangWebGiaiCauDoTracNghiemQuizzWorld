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

// query topics
$stmt = $topic->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // topics array
    $topics_arr = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $topic_item = array(
            "id" => $id,
            "name" => $name,
            "icon" => $icon,
            "count" => $count,
            "description" => html_entity_decode($description)
        );

        array_push($topics_arr, $topic_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show topics data in json format
    echo json_encode($topics_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No topics found.")
    );
}
