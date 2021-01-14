<?php 

include 'Connect.php';
$obj=new taikhoan();
$data = json_decode(file_get_contents("php://input"));
$result=$obj->Tao_thongtin_taikhoan($data);
$message['message']=$result;
echo json_encode($message);



?>