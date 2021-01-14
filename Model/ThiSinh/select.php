<?php
include 'Connect.php';

$obj=new thisinh();
$thisinh_list=$obj->Danhsach_thisinh();
echo json_encode($thisinh_list);
?>