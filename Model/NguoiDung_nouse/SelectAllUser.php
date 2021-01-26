<?php
include 'Connect_Nguoidung.php';



$obj=new Nguoidung();
$sinhvien_list=$obj->selectAllUser();

echo json_encode($sinhvien_list);


?>