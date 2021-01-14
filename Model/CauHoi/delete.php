<?php
include 'Connect.php';
$obj=new cauhoi();
$result=$obj->delete_thongtin_cauhoi($_GET['MaCH']);
$message['message']=$result;
echo json_encode($message);






?>