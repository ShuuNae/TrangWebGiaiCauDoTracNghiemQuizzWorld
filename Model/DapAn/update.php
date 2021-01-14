<?php 
include 'Connect.php';
$obj=new dapan();
$data = json_decode(file_get_contents("php://input"));
$result=$obj->update_thongtin_dapan($data);
$message['message']=$result;
echo json_encode($message);
?>