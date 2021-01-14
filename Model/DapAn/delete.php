<?php
include 'Connect.php';
$obj=new dapan();
$result=$obj->delete_thongtin_dapan($_GET['MaDA']);
$message['message']=$result;
echo json_encode($message);






?>