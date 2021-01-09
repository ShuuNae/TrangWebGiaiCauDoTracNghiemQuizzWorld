<?php 

include 'Connect.php';
$obj=new thisinh();
$data = json_decode(file_get_contents("php://input"));
$result=$obj->Tao_thongtin_thisinh($data);
$message['message']=$result;
echo json_encode($message);



?>