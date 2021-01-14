<?php 

include 'Connect.php';
$obj=new cauhoi();
$data = json_decode(file_get_contents("php://input"));
$result=$obj->Tao_thongtin_cauhoi($data);
$message['message']=$result;
echo json_encode($message);



?>