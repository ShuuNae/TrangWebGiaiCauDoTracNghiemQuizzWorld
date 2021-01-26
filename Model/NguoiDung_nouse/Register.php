<?php 

include 'Connect_Nguoidung.php';
$obj=new Nguoidung();
$data = json_decode(file_get_contents("php://input"));
$result=$obj->register($data);
$message['message']=$result;
echo json_encode($message);



?>