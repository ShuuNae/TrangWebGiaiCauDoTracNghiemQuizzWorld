<?php
include 'Connect.php';



$obj=new taikhoan();
$taikhoan_list=$obj->Danhsach_taikhoan($_GET['page'],$_GET['search_input']);


echo json_encode($taikhoan_list);


?>