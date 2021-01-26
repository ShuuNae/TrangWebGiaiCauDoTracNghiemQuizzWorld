<?php 
header('Access-Control-Allow-Origin: *');
include 'Connect_Nguoidung.php';
$obj=new Nguoidung();
$data = json_decode(file_get_contents("php://input"));
$result=$obj->login($data);
$message['message']=$result;
echo json_encode($message);



?>