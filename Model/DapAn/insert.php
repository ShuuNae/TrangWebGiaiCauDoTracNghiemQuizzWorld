<?php 

include 'Connect.php';
$obj=new dapan();
$data = json_decode(file_get_contents("php://input"));
$result=$obj->view_dapan_id($data);
$message['message']=$result;
echo json_encode($message);



?>