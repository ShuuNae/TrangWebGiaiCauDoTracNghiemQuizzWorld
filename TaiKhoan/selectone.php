
<?php
include 'taikhoan.php';
$obj=new taikhoan();
$taikhoan_data=$obj->Danhsach_taikhoan($_GET['SV_id']);
echo json_encode($taikhoan_data);
//echo $taikhoan_data;


?>
