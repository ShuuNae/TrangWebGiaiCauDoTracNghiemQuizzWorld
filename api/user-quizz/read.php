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
include_once '../objects/user_quizz.php';

// instantiate database and user_quizz object
$database = new Database();
$db = $database->getConnection();

// initialize object
$user_quizz = new UserQuizz($db);

$user_quizz->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();
if (isset($_GET['topic_id'])) {
    $user_quizz->topic_id = $_GET['topic_id'];
}

// query user_quizzs
$stmt = $user_quizz->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // user_quizzs array
    $user_quizzs_arr = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $user_quizz_item = array(
            "id" =>  $id,
            "user_id" => isset($user_id) ? $user_id : null,
            "topic_id" => isset($topic_id) ? $user_id : null,
            "name" => $name,
            "start_at" => $start_at,
            "finish_at" => $finish_at,
            "score" => $score,
            "quizz_data" => isset($quizz_data) ? $user_id : null
        );

        array_push($user_quizzs_arr, $user_quizz_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show user_quizzs data in json format
    echo json_encode($user_quizzs_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No user_quizzs found.")
    );
}
