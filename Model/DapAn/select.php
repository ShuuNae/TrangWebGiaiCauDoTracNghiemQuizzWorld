<?php
include 'Connect.php';



$obj=new dapan();
$dapan_list=$obj->Danhsach_sinhvien();


echo json_encode($dapan_list);


?>