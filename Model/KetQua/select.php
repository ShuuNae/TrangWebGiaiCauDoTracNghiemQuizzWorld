<?php
header('Access-Control-Allow-Origin: *');
include 'Connect.php';



$obj=new ketqua();
$taikhoan_list=$obj->Danhsach_ketqua();


echo json_encode($taikhoan_list);


?>