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
include_once '../objects/quizz.php';

// instantiate database and quizz object
$database = new Database();
$db = $database->getConnection();

// initialize object
$quizz = new Quizz($db);

// query quizzs
$stmt = $quizz->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // quizzs array
    $quizzs_arr = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $quizz_item = array(
            "id" =>  $id,
            "topic_id" =>  $topic_id,
            "question" =>  $question,
            "ansA" =>  $ansA,
            "ansB" =>  $ansB,
            "ansC" =>  $ansC,
            "ansD" => $ansD,
            "correct" => $correct
        );

        array_push($quizzs_arr, $quizz_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show quizzs data in json format
    echo json_encode($quizzs_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No quizzs found.")
    );
}
