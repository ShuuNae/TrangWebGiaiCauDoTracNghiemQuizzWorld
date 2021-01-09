<?php
include 'Connect.php';

$obj=new thisinh();
$thisinh_list=$obj->Danhsach_thisinh($_GET['page'],$_GET['search_input']);
echo json_encode($thisinh_list);
?>