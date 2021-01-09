<?php
include 'Connect.php';
$obj=new taikhoan();
$result=$obj->delete_thongtin_taikhoan($_GET['SV_id']);
$message['message']=$result;
echo json_encode($message);






?>