<?php
include 'Connect.php';
$obj=new thisinh();
$result=$obj->delete_thongtin_thisinh($_GET['MaTS']);
$message['message']=$result;
echo json_encode($message);
?>