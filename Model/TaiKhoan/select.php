<?php
header('Access-Control-Allow-Origin: *');
include 'Connect.php';



$obj=new taikhoan();
$taikhoan_list=$obj->Danhsach_taikhoan();


echo json_encode($taikhoan_list);


?>