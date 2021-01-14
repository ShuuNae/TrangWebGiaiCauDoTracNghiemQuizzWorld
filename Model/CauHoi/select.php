<?php
include 'Connect.php';



$obj=new cauhoi();
$cauhoi_list=$obj->Danhsach_cauhoi();


echo json_encode($cauhoi_list);


?>